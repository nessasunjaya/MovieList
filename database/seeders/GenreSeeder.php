<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            "name" => "Action"
        ]);

        DB::table('genres')->insert([
            "name" => "Thriller"
        ]);

        DB::table('genres')->insert([
            "name" => "Horror"
        ]);

        DB::table('genres')->insert([
            "name" => "Romance"
        ]);

        DB::table('genres')->insert([
            "name" => "Drama"
        ]);

        DB::table('genres')->insert([
            "name" => "Fantasy"
        ]);
    }
}
