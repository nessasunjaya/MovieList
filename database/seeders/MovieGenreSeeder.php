<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_genres')->insert([
            "movie_id" => "1",
            "genre_id" => "1"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "1",
            "genre_id" => "2"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "2",
            "genre_id" => "1"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "3",
            "genre_id" => "1"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "3",
            "genre_id" => "2"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "4",
            "genre_id" => "4"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "4",
            "genre_id" => "5"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "5",
            "genre_id" => "4"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "5",
            "genre_id" => "5"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "6",
            "genre_id" => "2"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "6",
            "genre_id" => "3"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "7",
            "genre_id" => "5"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "7",
            "genre_id" => "6"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "8",
            "genre_id" => "1"
        ]);

        DB::table('movie_genres')->insert([
            "movie_id" => "8",
            "genre_id" => "6"
        ]);
    }
}
