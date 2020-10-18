<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++)
        {
        DB::table('blog_posts')->insert(
        [
            'title'=>Str::random(10),
            'bodytext'=>Str::random(50),
            'created_at'=>now(),
            'updated_at'=>now()
        ]
        );
        }
    }
}
