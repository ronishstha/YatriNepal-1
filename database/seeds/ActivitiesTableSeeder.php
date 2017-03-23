<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity = new Activity();
        $activity->title = 'Hiking';
        $activity->slug = str_slug($activity->title, '-');
        $activity->user_id = '1';
        $activity->region_id = '3';
        $activity->status = 'unpublished';
        $activity->save();
    }
}
