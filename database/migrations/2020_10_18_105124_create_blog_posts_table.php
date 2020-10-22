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
            $table->bigInteger('category_id')->unsigned();// ид категории которой принадлежит пост
            $table->bigInteger('user_id')->unsigned();// ид автора

            $table->string('slug')->unique();//название поста в транслите, уникальный.по нему будут строится url
            $table->string('title'); // название поста

            $table->text('excerpt')->nullable();// выдержка из статьи(кусочек статьи)

            $table->text('content_raw'); // сырой контент. вначале попадает сюда,
                                                // автоматически при сохранении превратиться в html
            $table->text('content_html');// html контент, именно он показывается на странице (read only)

            $table->boolean('is_published')->default(false);//опубликована ли
            $table->timestamp('published_at')->nullable();//дата публикации

            $table->timestamps();//дата создания изменения
            $table->softDeletes(); //дата удаления

            //говорим что, user_id из текущей страницы ссылается на id таблицы user
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('blog_categories');
            $table->index('is_published'); //индекция по этому полю
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
