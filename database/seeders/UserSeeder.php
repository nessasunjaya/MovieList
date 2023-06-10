<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            "username" => "Vanessa",
            "email" => "vanessa@email.com",
            "password" => bcrypt("123456"),
            "date_joined" => "2022-11-28",
            "date_of_birth" => "2003-07-15",
            "phone" => "0818123456",
            "image_profile" => "storage/profile/blank.png",
            "role" => "user"
        ]);

        DB::table('users')->insert([
            "username" => "admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin123"),
            "date_joined" => "2022-11-28",
            "date_of_birth" => "2001-01-01",
            "phone" => "0818123456",
            "image_profile" => "storage/profile/blank.png",
            "role" => "admin"
        ]);

        DB::table('users')->insert([
            "username" => "Ben",
            "email" => "ben@email.com",
            "password" => bcrypt("benben123"),
            "date_joined" => "2022-11-28",
            "date_of_birth" => "2002-02-02",
            "phone" => "0818123456",
            "image_profile" => "storage/profile/blank.png",
            "role" => "user"
        ]);
    }
}
