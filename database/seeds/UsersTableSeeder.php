<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Ronish";
        $user->save();

        $user = new User();
        $user->name = "Shrestha";
        $user->save();
    }
}
