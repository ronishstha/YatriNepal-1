<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = new Region();
        $region->title = 'Helambu';
        $region->country_id = '1';
        $region->slug = str_slug($region->title, '-');
        $region->user_id = '1';
        $region->status = 'published';
        $region->save();

    }
}
