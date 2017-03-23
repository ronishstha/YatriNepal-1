<?php

use Illuminate\Database\Seeder;
use App\Destination;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destination = new Destination();
        $destination->title = 'Pokhara' ;
        $destination->slug = str_slug($destination->title, '-');
        $destination->country_id = '';
        $destination->description = '';
        $destination->user_id = '';
        $destination->status = '';
    }
}
