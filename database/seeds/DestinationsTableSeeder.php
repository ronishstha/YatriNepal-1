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
        $destination->country_id = '1';
        $destination->image = 'nothingnow' ;
        $destination->description = 'A must visit place before u die';
        $destination->user_id = '3';
        $destination->status = 'unpublished';
        $destination->save();
    }
}
