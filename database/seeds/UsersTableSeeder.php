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
        $user->email = "superadmin@yatri.com";
        $user->password = bcrypt("iamsuperadmin");
        $user->save();

        $user = new User();
        $user->name = "Admin";
        $user->email = "anotheradmin@yatri.com";
        $user->password = bcrypt("iamsuperadmin");
        $user->save();
    }
}
