<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = new Country();
        $countries->title = '';
        $countries->flag = '';
        $countries->slug = '';
        $countries->user_id = '';
        $countries->status = '';

    }
}
