<?php

use Illuminate\Database\Seeder;
use App\Itinerary;

class ItineraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itin = new Itinerary();
        $itin->title = '' ;
        $itin->trip_duration = '' ;
        $itin->trekking_duration = '' ;
        $itin->trekking_grade = '' ;
        $itin->accomodation = '' ;
        $itin->meals = '' ;
        $itin->max_altitude = '' ;
        $itin->best_time = '' ;
        $itin->group_size = '' ;
        $itin->start_end = '' ;
        $itin->arrival = '' ;
        $itin->departure = '' ;
        $itin->date = '' ;
        $itin->cost = '' ;
        $itin->image = '' ;
        $itin->route_map = '' ;
        $itin->country_id = '' ;
        $itin->destination_id = '' ;
        $itin->region_id = '' ;
        $itin->activity_id = '' ;
        $itin->category_id = '' ;
        $itin->summary = '' ;
        $itin->trip_introduction = '' ;
        $itin->itinerary = '' ;
        $itin->important_note = '' ;
        $itin->cost_inclusive = '' ;
        $itin->cost_exclusive = '' ;
        $itin->trekking_group = '' ;
        $itin->trip_status = '' ;
        $itin->slug = '' ;
        $itin->user_id = '' ;
        $itin->status = '' ;
        $itin->save();



    }
}
