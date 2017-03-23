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
        $region->title = '';
        $region->destination_id = '';
        $region->slug = '';
        $region->user_id = '';
        $region->status = '';

    }
}
