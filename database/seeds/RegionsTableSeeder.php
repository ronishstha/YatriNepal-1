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
        $region->title = 'Beautiful';
        $region->destination_id = '1';
        $region->slug = str_slug($region->title, '-');
        $region->user_id = '2';
        $region->status = 'unpublished';
        $region->save();

    }
}
