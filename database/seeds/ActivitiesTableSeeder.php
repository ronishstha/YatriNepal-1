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
        $activity->title = '';
        $activity->slug = '';
        $activity->user_id = '';
        $activity->region_id = '';
        $activity->status = '';
    }
}
