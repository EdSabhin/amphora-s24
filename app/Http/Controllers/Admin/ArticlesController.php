<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\BulkDestroyArticle;
use App\Http\Requests\Admin\Article\DestroyArticle;
use App\Http\Requests\Admin\Article\IndexArticle;
use App\Http\Requests\Admin\Article\StoreArticle;
use App\Http\Requests\Admin\Article\UpdateArticle;
use App\Models\Article;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Supabase\Storage\StorageClient;

class ArticlesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @param IndexArticle $request
   * @return array|Factory|View
   */
  public function index(IndexArticle $request)
  {
    // create and AdminListing instance for a specific model and
    $data = AdminListing::create(Article::class)->processRequestAndGet(
      // pass the request with params
      $request,

      // set columns to query
      ['id', 'visible', 'title', 'subHeadline', 'article', 'image', 'video', 'audio', 'videoUrl', 'audioUrl', 'file'],

      // set columns to searchIn
      ['id', 'title', 'subHeadline', 'article', 'image', 'video', 'audio', 'videoUrl', 'audioUrl', 'file']
    );

    if ($request->ajax()) {
      if ($request->has('bulk')) {
        return [
          'bulkItems' => $data->pluck('id')
        ];
      }
      return ['data' => $data];
    }

    return view('admin.article.index', ['data' => $data]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @throws AuthorizationException
   * @return Factory|View
   */
  public function create()
  {
    $this->authorize('admin.article.create');

    return view('admin.article.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param StoreArticle $request
   * @return array|RedirectResponse|Redirector
   */
  public function store(StoreArticle $request)
  {
      // Sanitize input
      $sanitized = $request->getSanitized();
  
      // Upload image to Supabase if it exists
      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imagePathname = $image->getPathname();
          $imageName = time() . "-" . $image->getClientOriginalName();
  
          
          // Upload image to Supabase bucket
          $supabaseStorage = new StorageClient(env('SUPABASE_URL'), env('SUPABASE_KEY'));
          $supabaseBucket = $supabaseStorage->from(env('SUPABASE_BUCKET'));
  
          // Try to upload the image and catch any errors
          try {
              $response = $supabaseBucket->upload(
                  $imageName,
                  file_get_contents($imagePathname),
                  [
                      'contentType' => $image->getClientMimeType()
                  ]
              );
  
              // Check if the upload was successful
              if (isset($response['error'])) {
                  return back()->withErrors(['image' => 'Error uploading image to Supabase: ' . $response['error']['message']]);
              }
  
              // Save the URL of the uploaded image
              $sanitized['image'] = env('SUPABASE_URL') . '/storage/v1/object/public/' . env('SUPABASE_BUCKET') . '/' . $imageName;
          } catch (Exception $e) {
              return back()->withErrors(['image' => 'Exception occurred: ' . $e->getMessage()]);
          }
      }
      // Store the Article with the image URL
      $article = Article::create($sanitized);
  
      if ($request->ajax()) {
          return ['redirect' => url('admin/articles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
      }
  
      return redirect('admin/articles');
  }


  /**
   * Display the specified resource.
   *
   * @param Article $article
   * @throws AuthorizationException
   * @return void
   */
  public function show(Article $article)
  {
    $this->authorize('admin.article.show', $article);

    // TODO your code goes here
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Article $article
   * @throws AuthorizationException
   * @return Factory|View
   */
  public function edit(Article $article)
  {
    $this->authorize('admin.article.edit', $article);


    return view('admin.article.edit', [
      'article' => $article,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UpdateArticle $request
   * @param Article $article
   * @return array|RedirectResponse|Redirector
   */
  public function update(UpdateArticle $request, Article $article)
  {
    // Sanitize input
    $sanitized = $request->getSanitized();

    // Update changed values Article
    $article->update($sanitized);

    if ($request->ajax()) {
      return [
        'redirect' => url('admin/articles'),
        'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
      ];
    }

    return redirect('admin/articles');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param DestroyArticle $request
   * @param Article $article
   * @throws Exception
   * @return ResponseFactory|RedirectResponse|Response
   */
  public function destroy(DestroyArticle $request, Article $article)
  {
    $article->delete();

    if ($request->ajax()) {
      return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    return redirect()->back();
  }

  /**
   * Remove the specified resources from storage.
   *
   * @param BulkDestroyArticle $request
   * @throws Exception
   * @return Response|bool
   */
  public function bulkDestroy(BulkDestroyArticle $request): Response
  {
    DB::transaction(static function () use ($request) {
      collect($request->data['ids'])
        ->chunk(1000)
        ->each(static function ($bulkChunk) {
          Article::whereIn('id', $bulkChunk)->delete();

          // TODO your code goes here
        });
    });

    return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
  }
}
