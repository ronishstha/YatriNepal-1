<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{

    public function run()
    {
        $countries = new Country();
        $countries->title = 'Nepal';
        $countries->flag = 'nothinghere';
        $countries->slug = str_slug($countries->title, '-');
        $countries->user_id = '1';
        $countries->status = 'unpublished';
        $countries->save();
    }
}
