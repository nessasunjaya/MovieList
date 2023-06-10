<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function watchlist(){
        return $this->hasMany(Watchlist::class);
    }

    public function movieplayed(){
        return $this->hasMany(MoviePlayed::class);
    }

    public function moviegenre(){
        return $this->hasMany(MovieGenre::class);
    }

}
