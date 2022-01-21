<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user=User::create([
            "name"=>"sana",
            "email"=>"admin3@m.com",
            "password"=>bcrypt("password"),
        ]);

        $user->attachRole('admin');
    }
}
