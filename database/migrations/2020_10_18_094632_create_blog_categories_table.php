<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->unsigned()->default(1);//категория по умолчаниюбез парента
            $table->string('slug')->nullable(); //название категории в транслите, уникальный.по нему будут строится url
            $table->string('title');//название категории
            $table->text('description')->nullable();//описание категории, по умолчанию можно не заполнять
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
