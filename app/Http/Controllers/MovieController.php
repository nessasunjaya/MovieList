<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MoviePlayed;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    //
    public static function getActorMovie($actor_id)
    {
        $movie = MoviePlayed::where('actor_id', $actor_id)->first();
        return $movie;
    }

    public static function checkAddedToWatchlist($user_id, $movie_id)
    {
        if (!Watchlist::where('movie_id', '=', $movie_id)->where('user_id', '=', $user_id)->exists()) {
            return false;
        } else return true;
    }

    public static function getPopularMovie($movie_id)
    {
        $movie = Watchlist::where('movie_id', $movie_id)->first();
        return $movie;
    }

    public static function popularMovies()
    {
        $popular = Watchlist::orderBy('total', 'desc')->selectRaw('movie_id, count(*) as total')->groupBy('movie_id')->get();
        return $popular;
    }

    public function movieDetail($id)
    {
        if (Movie::where('id', $id)->exists()) {
            $movie = Movie::where('id', $id)->first();

            $data = array(
                'movie' => $movie,
                'movies' => Movie::inRandomOrder()->limit(8)->Get(),
                'cast' => MoviePlayed::get()->where('movie_id', $id)
            );
            return view('moviedetail', $data);
        } else {
            return view('home');
        }
    }

    public function showMovies()
    {
        $data = array(
            'movies' => Movie::Get(),
            'genres' => MovieGenre::Get()
        );
        return view('movies', $data);
    }

    public function addMovie(Request $request)
    {
        // save Movie
        $movie = new Movie();

        $validation = [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | min:8',
            'genre_1' => 'required',
            'actor_id_1' => 'required',
            'character_name_1' => 'required',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'thumbnail_image' => 'required | image',
            'background_image' => 'required | image'
        ];

        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $file1 = $request->file('thumbnail_image');
        $imageName1 = time() . '.' . $file1->getClientOriginalExtension();

        $file2 = $request->file('background_image');
        $imageName2 = time() . '.' . $file2->getClientOriginalExtension();

        Storage::putFileAs('public/movies/', $file1, $imageName1);
        Storage::putFileAs('public/moviesbackground/', $file2, $imageName2);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->release_date = $request->release_date;
        $movie->thumbnail_image = 'storage/movies/' . $imageName1;
        $movie->background_image = 'storage/moviesbackground/' . $imageName2;

        $movie->save();

        // save MovieGenre
        $genreTotal = Genre::Get()->count();

        $genreCount = 1;
        for ($genreCount = 1; $genreCount <= $genreTotal; $genreCount++) {
            if ($request->input('genre_' . $genreCount)) {
                if (!MovieGenre::where('genre_id', $request->input('genre_' . $genreCount))->where('movie_id', $movie->id)->exists()) {
                    $moviegenre = new MovieGenre();
                    $moviegenre->movie_id = $movie->id;
                    $moviegenre->genre_id = $request->input('genre_' . $genreCount);

                    $moviegenre->save();
                }
            } else break;
        }

        // save MoviePlayed
        $actorTotal = Actor::Get()->count();

        $actorCount = 1;
        for ($actorCount = 1; $actorCount <= $actorTotal; $actorCount++) {
            if ($request->input('actor_id_'.$actorCount) && $request->input('character_name_'.$actorCount)) {
                if (!MoviePlayed::where('actor_id', $request->input('actor_id_'.$actorCount))->where('movie_id', $movie->id)->exists()) {
                    $movieplayed = new MoviePlayed();
                    $movieplayed->movie_id = $movie->id;
                    $movieplayed->actor_id = $request->input('actor_id_'.$actorCount);
                    $movieplayed->character_name = $request->input('character_name_'.$actorCount);

                    $movieplayed->save();
                }
            } else break;
        }

        return redirect()->back();
    }

    public function editMovie(Request $request){
        // save Movie
        $movie = Movie::find($request->id);

        $validation = [
            'title' => 'required | min:2 | max:50',
            'description' => 'required | min:8',
            'genre_1' => 'required',
            'actor_id_1' => 'required',
            'character_name_1' => 'required',
            'director' => 'required | min:3',
            'release_date' => 'required',
            'thumbnail_image' => 'required | image',
            'background_image' => 'required | image'
        ];

        $validator = Validator::make($request->all(), $validation);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $file1 = $request->file('thumbnail_image');
        $imageName1 = time() . '.' . $file1->getClientOriginalExtension();

        $file2 = $request->file('background_image');
        $imageName2 = time() . '.' . $file2->getClientOriginalExtension();

        Storage::putFileAs('public/movies/', $file1, $imageName1);
        Storage::putFileAs('public/moviesbackground/', $file2, $imageName2);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->director = $request->director;
        $movie->release_date = $request->release_date;
        $movie->thumbnail_image = 'storage/movies/' . $imageName1;
        $movie->background_image = 'storage/moviesbackground/' . $imageName2;

        $movie->save();

        // delete existing MovieGenre
        while(MovieGenre::where('movie_id', $movie->id)->exists()){
            $moviegenrePrevious = MovieGenre::where('movie_id', $movie->id)->first();
            $moviegenrePrevious->delete();
        }

        // save MovieGenre
        $genreTotal = Genre::Get()->count();

        $genreCount = 1;
        for ($genreCount = 1; $genreCount <= $genreTotal; $genreCount++) {
            if ($request->input('genre_' . $genreCount)) {
                if (!MovieGenre::where('genre_id', $request->input('genre_' . $genreCount))->where('movie_id', $movie->id)->exists()) {
                    $moviegenre = new MovieGenre();
                    $moviegenre->movie_id = $movie->id;
                    $moviegenre->genre_id = $request->input('genre_' . $genreCount);

                    $moviegenre->save();
                }
            } else break;
        }

        // delete existing MoviePlayed
        while(MoviePlayed::where('movie_id', $movie->id)->exists()){
            $movieplayedPrevious = MoviePlayed::where('movie_id', $movie->id)->first();
            $movieplayedPrevious->delete();
        }

        // save MoviePlayed
        $actorTotal = Actor::Get()->count();

        $actorCount = 1;
        for ($actorCount = 1; $actorCount <= $actorTotal; $actorCount++) {
            if ($request->input('actor_id_'.$actorCount) && $request->input('character_name_'.$actorCount)) {
                if (!MoviePlayed::where('actor_id', $request->input('actor_id_'.$actorCount))->where('movie_id', $movie->id)->exists()) {
                    $movieplayed = new MoviePlayed();
                    $movieplayed->movie_id = $movie->id;
                    $movieplayed->actor_id = $request->input('actor_id_'.$actorCount);
                    $movieplayed->character_name = $request->input('character_name_'.$actorCount);

                    $movieplayed->save();
                }
            } else break;
        }

        return redirect()->back();
    }

    public function addToWatchlist($user_id, $movie_id)
    {
        $watchlist = new Watchlist();

        $watchlist->user_id = $user_id;
        $watchlist->movie_id = $movie_id;
        $watchlist->status = "Planned";

        $watchlist->save();
        return redirect()->back();
    }

    public function removeFromWatchlist($user_id, $movie_id)
    {
        $watchlist = Watchlist::where('user_id', $user_id)->where('movie_id', $movie_id);
        $watchlist->delete();
        return redirect()->back();
    }

    public function updateWatchlist(Request $request)
    {
        $watchlist = Watchlist::where('user_id', Auth::user()->id)->where('movie_id', $request->movie_id)->first();
        if ($request->status == "Removed") {
            $watchlist->delete();
        } else {
            $watchlist->status = $request->status;
            $watchlist->save();
        }
        return redirect()->back();
    }
}
