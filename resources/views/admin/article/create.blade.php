@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.article.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <article-form
            :action="'{{ url('admin/articles') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate enctype="multipart/form-data">
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.article.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.article.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </article-form>

        </div>

        </div>

    
@endsection