<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->boolean('visible');
      $table->string('title');
      $table->string('subHeadline');
      $table->string('article');
      $table->string('image');
      $table->string('video');
      $table->string('audio');
      $table->string('videoUrl');
      $table->string('audioUrl');
      $table->string('file');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('articles');
  }
};
