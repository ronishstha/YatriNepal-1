<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->title = 'Adventure';
        $category->slug = str_slug($category->title,'-');
        $category->description = 'Fun area';
        $category->user_id = '3';
        $category->status = 'unpublished';
        $category->save();

    }
}
