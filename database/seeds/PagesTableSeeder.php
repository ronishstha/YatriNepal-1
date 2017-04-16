<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = new Page();
        $pages->title = 'About Yatri Nepal';
        $pages->page = '';
        $pages->content = 'Travelling with G Adventures is the very best way to get up close and personal with your planet in a way you’d never manage on your own. For more than 20 years, we’ve brought together people from all over the globe to create lifelong connections. This is your planet, after all—and the better you get to know it.....';
        $pages->slug = str_slug($pages->title, '-');
        $pages->user_id = '1';
        $pages->status = 'published';
        $pages->save();
    }
}
