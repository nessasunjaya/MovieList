<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        $data = array(
            'movies' => Movie::Get(),
            'watchlist' => Watchlist::Get(),
            'genres' => Genre::Get(),
            'carousels' => Movie::inRandomOrder()->limit(3)->Get()
        );
        return view('home', $data);
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function addmovie(){
        $data = array(
            'actors' => Actor::Get(),
            'genres' => Genre::Get(),
            'actor_count' => Actor::Get()->count(),
            'genre_count' => Genre::Get()->count()
        );
        return view('addmovie', $data);
    }
    public function addactor(){
        return view('addactor');
    }
    public function editmovie($id){
        if(Movie::where('id', $id)->exists()){
            $data = array(
                'movie' => Movie::where('id', $id)->first(),
                'actors' => Actor::Get(),
                'genres' => Genre::Get(),
                'actor_count' => Actor::Get()->count(),
                'genre_count' => Genre::Get()->count()
            );
            return view('editmovie', $data);
        }else{
            return view('home');
        }
    }
    public function editactor($id){
        if(Actor::where('id', $id)->exists()){
            $actor = Actor::where('id', $id)->first();
            return view('editactor', compact('actor'));
        }else{
            return view('home');
        }
    }
    public function profile(){
        return view('profile');
    }
    public function watchlist(){
        return view('watchlist');
    }
    public function searchMovieHome(Request $request){
        $data = array(
            'movies' => Movie::where('title', 'LIKE', "%$request->search%")->get(),
            'watchlist' => Watchlist::Get(),
            'genres' => Genre::Get(),
            'carousels' => Movie::inRandomOrder()->limit(3)->Get()
        );
        return view('home', $data);
    }

    public function searchMovie(Request $request){
        $data = array(
            'movies' => Movie::where('title', 'LIKE', "%$request->search%")->get()
        );
        return view('movies', $data);
    }

    public function searchActor(Request $request){
        $data = array(
            'actors' => Actor::where('name', 'LIKE', "%$request->search%")->get()
        );
        return view('actors', $data);
    }

    public function searchMovieWatchlist(Request $request){
        $data = array(
            'watchlists' => Watchlist::where('user_id', Auth::user()->id)->whereRelation('movie', 'title', "LIKE", "%$request->search%")->simplePaginate(4)
        );
        return view('watchlist', $data);
    }

    public function searchGenre($id){
        $data = array(
            'movies' => Movie::whereRelation('moviegenre', 'genre_id', $id)->Get(),
            'watchlist' => Watchlist::Get(),
            'genres' => Genre::Get(),
            'carousels' => Movie::inRandomOrder()->limit(3)->Get()
        );
        return view('home', $data);
    }

    public function sortBy($param){
        $movie = Movie::Get();
        if($param == 'latest') $movie = Movie::orderBy('release_date', 'desc')->Get();
        else if($param == 'desc') $movie = Movie::orderBy('title', 'desc')->Get();
        else if($param == 'asc') $movie = Movie::orderBy('title', 'asc')->Get();
        $data = array(
            'movies' => $movie,
            'watchlist' => Watchlist::Get(),
            'genres' => Genre::Get(),
            'carousels' => Movie::inRandomOrder()->limit(3)->Get()
        );
        return view('home', $data);
    }

    public function searchStatus($status){
        $watchlist = Watchlist::Get();
        if($status == 'all') $watchlist = Watchlist::where('user_id', Auth::user()->id)->simplePaginate(4);
        else if($status == 'planned') $watchlist = Watchlist::where('status', 'planned')->where('user_id', Auth::user()->id)->simplePaginate(4);
        else if($status == 'watching') $watchlist = Watchlist::where('status', 'watching')->where('user_id', Auth::user()->id)->simplePaginate(4);
        else if($status == 'finished') $watchlist = Watchlist::where('status', 'finished')->where('user_id', Auth::user()->id)->simplePaginate(4);
        $data = array(
            'watchlists' => $watchlist
        );
        return view('watchlist', $data);
    }
}
