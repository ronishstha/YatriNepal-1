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
        $user->email = "stharonish@gmail.com";
        $user->password = bcrypt("iamronish");
        $user->save();

        $user = new User();
        $user->name = "Shrestha";
        $user->email = "ronishstha@gmail.com";
        $user->password = bcrypt("shrestha");
        $user->save();
    }
}
