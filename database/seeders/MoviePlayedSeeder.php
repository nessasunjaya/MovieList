<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviePlayedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_playeds')->insert([
            "movie_id" => "1",
            "actor_id" => "1",
            "character_name" => "Owen Grady"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "1",
            "actor_id" => "2",
            "character_name" => "Claire Dearing"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "2",
            "actor_id" => "3",
            "character_name" => "Victor Sullivan"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "2",
            "actor_id" => "4",
            "character_name" => "Nathan Drake"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "3",
            "actor_id" => "5",
            "character_name" => "Jérôme"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "3",
            "actor_id" => "6",
            "character_name" => "Abdel"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "4",
            "actor_id" => "7",
            "character_name" => "Poong Woon-ho"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "4",
            "actor_id" => "8",
            "character_name" => "Na Bo-ra"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "5",
            "actor_id" => "9",
            "character_name" => "Asakura Haruto"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "5",
            "actor_id" => "10",
            "character_name" => "Ariake Misaki"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "6",
            "actor_id" => "11",
            "character_name" => "Danny"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "6",
            "actor_id" => "12",
            "character_name" => "Ever"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "7",
            "actor_id" => "13",
            "character_name" => "Reina Hama"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "7",
            "actor_id" => "14",
            "character_name" => "Noppo"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "8",
            "actor_id" => "1",
            "character_name" => "Barley Lightfoot"
        ]);

        DB::table('movie_playeds')->insert([
            "movie_id" => "8",
            "actor_id" => "4",
            "character_name" => "Ian Lightfoot"
        ]);
    }
}
