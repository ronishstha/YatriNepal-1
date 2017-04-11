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
        $user->name = "Yatri";
        $user->email = "yatri@nepal.com";
        $user->password = bcrypt("yatri@nepal");
        $user->save();
    }
}
