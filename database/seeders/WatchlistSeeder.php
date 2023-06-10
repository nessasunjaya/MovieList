<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('watchlists')->insert([
            "user_id" => "1",
            "movie_id" => "1",
            "status" => "Watching"
        ]);

        DB::table('watchlists')->insert([
            "user_id" => "1",
            "movie_id" => "4",
            "status" => "Planned"
        ]);

        DB::table('watchlists')->insert([
            "user_id" => "1",
            "movie_id" => "7",
            "status" => "Finished"
        ]);

    }
}
