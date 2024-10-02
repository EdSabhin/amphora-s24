<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

  protected $fillable = ['visible', 'title', 'subHeadline', 'article', 'image', 'video', 'audio', 'videoUrl', 'audioUrl', 'file'];
}
