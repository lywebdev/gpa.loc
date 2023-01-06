<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->index()->comment('Заголовок поста');
            $table->string('slug', 255)->unique()->comment('Слаг статьи');
            $table->longText('content')->comment('Содержимое поста');
            $table->string('preview')->nullable()->comment('Превью поста');
            $table->string('seo_keywords')->comment('Ключевые слова поста')->nullable();
            $table->text('seo_description')->comment('Описание поста')->nullable();
            $table->string('seo_image')->comment('Превью поста для SEO')->nullable();
            $table->boolean('status')->default(1)->comment('Статус видимости поста');

            $table->bigInteger('user_id')->nullable()->comment('Автор поста');
            $table->bigInteger('category_id')->nullable()->comment('Категория поста');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
