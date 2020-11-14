<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence(rand(3,8), true); //sentence -предложение
        $txt=$this->faker->realText(rand(1000, 4000));
        $isPublished=rand(1,5)>1; //раз в 5 случаев не опубликован
        $createdAt=$this->faker->dateTimeBetween('-3 months', '-2 days');

        return [
            'category_id'=>rand(1,10), // ид категории которой принадлежит пост
            'user_id'=>(rand(1,5)==5)?1:2, // ид автора
            'title'=>$title, // название поста
            'slug'=>Str::slug($title), //название поста в транслите, уникальный.по нему будут строится url
            'excerpt'=>$this->faker->text(rand(40,100)), // выдержка из статьи(кусочек статьи)
            'content_raw'=>$txt, // сырой контент при сохранении нужно передалть в html
            'content_html'=>$txt, // html контент, именно он показывается на странице (read only)
            'is_published'=>$isPublished,
            'published_at'=>$isPublished?$this->faker->dateTimeBetween('-2 months', '-1 days'):null,
            'created_at'=>$createdAt,
            'updated_at'=>$createdAt,
        ];
    }
}
