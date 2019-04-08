<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'author_id' => 3,
            'picture_id' => 1,
            'description_id' => 1,
            'category_id' => 1,
            'kitchen_id' => 1,
            'TTC' => 50,
            'COP' => 4,
            'Kcal' => 1000,
            'instruction' => Str::random(255),
        ]);
    }
}
