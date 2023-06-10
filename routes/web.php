<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login and register
Route::post('/login_user', [UserController::class, 'loginUser']);
Route::post('/register_user', [UserController::class, 'registerUser']);

// show pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/home', [PageController::class, 'home']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/movies', [MovieController::class, 'showMovies']);
Route::get('/actors', [ActorController::class, 'showActors']);
Route::get('/addmovie', [PageController::class, 'addmovie'])->middleware('adminCheck');
Route::get('/addactor', [PageController::class, 'addactor'])->middleware('adminCheck');
Route::get('/profile', [PageController::class, 'profile'])->middleware('authorizedCheck');
Route::get('/watchlist', [UserController::class, 'watchlist'])->middleware('userCheck');
Route::get('/logout', [UserController::class, 'logout'])->middleware('authorizedCheck');
Route::get('/editmovie/{id}', [PageController::class, 'editmovie'])->middleware('adminCheck');
Route::get('/editactor/{id}', [PageController::class, 'editactor'])->middleware('adminCheck');

// detail page
Route::get('/actor_detail/{id}', [ActorController::class, 'actorDetail']);
Route::get('/movie_detail/{id}', [MovieController::class, 'movieDetail']);

// search / sort movie action
Route::post('/searchMovieHome', [PageController::class, 'searchMovieHome']);
Route::post('/searchMovie', [PageController::class, 'searchMovie']);
Route::post('/searchActor', [PageController::class, 'searchActor']);
Route::post('/searchGenre/{id}', [PageController::class, 'searchGenre']);
Route::post('/sortBy/{param}', [PageController::class, 'sortBy']);
Route::post('/searchStatus/{status}', [PageController::class, 'searchStatus'])->middleware('userCheck');
Route::post('/searchMovieWatchlist', [PageController::class, 'searchMovieWatchlist'])->middleware('userCheck');

// add movies/actors/watchlist action
Route::post('/add_movie', [MovieController::class, 'addMovie'])->middleware('adminCheck');
Route::post('/add_actor', [ActorController::class, 'addActor'])->middleware('adminCheck');
Route::post('/add_to_watchlist/{user_id}/{movie_id}', [MovieController::class, 'addToWatchlist'])->middleware('userCheck');

// edit action
Route::post('/edit_user/{id}', [UserController::class, 'editUser'])->middleware("authorizedCheck");
Route::post('/edit_user_profile/{id}', [UserController::class, 'editUserProfile'])->middleware('authorizedCheck');
Route::post('/edit_movie/{id}', [MovieController::class, 'editMovie'])->middleware('adminCheck');
Route::post('/edit_actor/{id}', [ActorController::class, 'editActor'])->middleware('adminCheck');
Route::post('/update_watchlist/{movie_id}', [MovieController::class, 'updateWatchlist'])->middleware('userCheck');

// delete action
Route::get('/delete_movie/{id}', [MovieController::class, 'deleteMovie'])->middleware('adminCheck');
Route::post('/delete_actor/{id}', [ActorController::class, 'deleteActor'])->middleware('adminCheck');
Route::post('/remove_from_watchlist/{user_id}/{movie_id}', [MovieController::class, 'removeFromWatchlist'])->middleware('userCheck');
