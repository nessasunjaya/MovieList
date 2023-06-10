<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            "title" => "Jurassic World Dominion",
            "description" => "Four years after the destruction of Isla Nublar, dinosaurs now live and hunt alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history's most fearsome creatures.",
            "director" => "Colin Trevorrow",
            "release_date" => "2022-06-08",
            "thumbnail_image" => "storage/movies/1.jpg",
            "background_image" => "storage/moviesbackground/1.png"
        ]);

        DB::table('movies')->insert([
            "title" => "Uncharted",
            "description" => "Victor Sullivan recruits Nathan Drake to help him find the lost fortune of Ferdinand Magellan. However, they face competition from Santiago Moncada, who believes that the treasure belongs to him.",
            "director" => "Ruben Fleischer",
            "release_date" => "2022-02-16",
            "thumbnail_image" => "storage/movies/2.jpg",
            "background_image" => "storage/moviesbackground/2.jpg"
        ]);

        DB::table('movies')->insert([
            "title" => "Athena",
            "description" => "Hours after the tragic death of their youngest brother in unexplained circumstances, three siblings have their lives thrown into chaos.",
            "director" => "Romain Gavras",
            "release_date" => "2022-09-02",
            "thumbnail_image" => "storage/movies/3.jpg",
            "background_image" => "storage/moviesbackground/3.jpg"
        ]);

        DB::table('movies')->insert([
            "title" => "20th Century Girl",
            "description" => "In 1999, a teen girl keeps close tabs on a boy in school on behalf of her deeply smitten best friend, then she gets swept up in a love story of her own.",
            "director" => "Bang Woo-ri",
            "release_date" => "2022-10-06",
            "thumbnail_image" => "storage/movies/4.jpg",
            "background_image" => "storage/moviesbackground/4.png"
        ]);

        DB::table('movies')->insert([
            "title" => "Love Like the Falling Petals",
            "description" => "Photographer Haruto falls head over heels for his hair stylist, Misaki. When he finally asks her out, it seems to be happily ever after for the young couple... until Misaki develops a rare disease causing her to age rapidly before their eyes.",
            "director" => "Yoshihiro Fukagawa",
            "release_date" => "2022-03-24",
            "thumbnail_image" => "storage/movies/5.jpg",
            "background_image" => "storage/moviesbackground/5.jpg"
        ]);

        DB::table('movies')->insert([
            "title" => "Unhuman",
            "description" => "Seven misfit students must band together against a growing gang of unhuman savages. Their trust in each other gets tested to the limit in a brutal, horrifying fight to survive as they take down the murderous zombie creatures.",
            "director" => "Marcus Dunstan",
            "release_date" => "2022-06-03",
            "thumbnail_image" => "storage/movies/6.jpg",
            "background_image" => "storage/moviesbackground/6.jpg"
        ]);

        DB::table('movies')->insert([
            "title" => "Drifting Home",
            "description" => "During summer break, sixth graders Kosuke and Natsume play in an apartment building set to be demolished. They find themselves caught up in a strange phenomenon. All they can see around them is a vast sea.",
            "director" => "Hiroyasu Ishida",
            "release_date" => "2022-09-16",
            "thumbnail_image" => "storage/movies/7.jpg",
            "background_image" => "storage/moviesbackground/7.jpg"
        ]);

        DB::table('movies')->insert([
            "title" => "Onward",
            "description" => "In a magical world full of technological advances, elven brothers Ian and Barley Lightfoot set out on an adventure to resurrect their late father for a day.",
            "director" => "Dan Scanlon",
            "release_date" => "2022-03-04",
            "thumbnail_image" => "storage/movies/8.jpg",
            "background_image" => "storage/moviesbackground/8.jpg"
        ]);

    }
}
