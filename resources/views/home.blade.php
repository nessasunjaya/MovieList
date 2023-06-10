@php
    use App\Http\Controllers\MovieController;
@endphp
@extends('layout.navbar')

@section('title', 'Home')

@section('content')
    <div id="movieCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="0" class=""
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#movieCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                class=""></button>
        </div>
        <div class="carousel-inner">
            @foreach ($carousels as $c)
                @if ($loop->first)
                    <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                @endif
                <div class="background" style="background-image: url('{{ asset($c->background_image) }}')"></div>
                <div class="container">
                    <div class="carousel-caption text-start">
                        @php
                            $time = date_create("$c->release_date");
                            $added = false;
                            if (Auth::user()) {
                                $added = MovieController::checkAddedToWatchlist(Auth::user()->id, $c->id);
                            }
                        @endphp
                        <h1>{{ $c->title }} ({{ date_format($time, 'Y') }})</h1>
                        <p>{{ $c->description }}</p>
                        @auth
                            @if (Auth::user() && Auth::user()->role == 'user' && !$added)
                                <form action="{{ url('add_to_watchlist/'.Auth::user()->id.'/'.$c->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-lg btn-primary" type="submit"> <b>&#43;</b> Add to
                                        Watchlist</button>
                                </form>
                            @elseif (Auth::user() && Auth::user()->role == 'user' && $added)
                                <form action="{{ url('remove_from_watchlist/'.Auth::user()->id.'/'.$c->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-lg btn-primary" type="submit"
                                        style="background-color: white; color: rgb(220, 63, 63)"> <b>
                                            &#128465;</b> Remove from Watchlist</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#movieCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#movieCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="header ">
        <h3><span>|</span> Popular</h3>
    </div>
    <div class="items">
        @php
            $popular = MovieController::popularMovies();
        @endphp
        @foreach ($popular as $p)
            @php
                $movie = MovieController::getPopularMovie($p->movie_id);
            @endphp
            <a href="{{ url('movie_detail/' . $p->movie_id) }}">
                <div class="m-2">
                    <div class="card">
                        <div class="text-center">
                            <div class="item-cover"
                                style="background-image: url('{{ asset($movie->movie->thumbnail_image) }}')">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <h5 class="card-title">{{ $movie->movie->title }}</h5>
                        @php
                            $time = date_create($movie->movie->release_date);
                        @endphp
                        <h6 class="card-subtitle text-muted">{{ date_format($time, 'Y') }}</h6>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="header ">
        <h3><span>|</span> Movie</h3>
        <div>
            <form class="d-flex" action="{{ url('searchMovieHome') }}" method="POST">
                {{ csrf_field() }}
                <input class="form-control me-sm-2" type="text" name="search" placeholder="Search">
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ url('addmovie') }}" class="btn btn-primary" style="padding-top: 10px">Add</a>
                @endif
            </form>
        </div>
    </div>
    <div class="text-center">
        <div style="display: flex; justify-content: center" class="m-0">
            <form action="{{ url('sortBy/latest') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary m-3"
                    style="background-color: rgb(255, 255, 255); color: rgb(220, 63, 63)">Latest</button>
            </form>
            <form action="{{ url('sortBy/asc') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary m-3"
                    style="background-color: rgb(255, 255, 255); color: rgb(220, 63, 63)">A-Z</button>
            </form>
            <form action="{{ url('sortBy/desc') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary m-3"
                    style="background-color: rgb(255, 255, 255); color: rgb(220, 63, 63)">Z-A</button>
            </form>
        </div>
        <div style="display: flex; justify-content: center">
            @foreach ($genres as $genre)
                <form action="{{ url('searchGenre/' . $genre->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-primary m-3"
                        style="background-color: rgb(220, 63, 63); color: rgb(255, 255, 255)">{{ $genre->name }}</button>
                </form>
            @endforeach
        </div>
    </div>
    <div class="items mb-5">
        @foreach ($movies as $movie)
            <a href="{{ url('movie_detail/' . $movie->id) }}">
                <div class="m-2">
                    <div class="card">
                        <div class="text-center">
                            <div class="item-cover" style="background-image: url('{{ asset($movie->thumbnail_image) }}')">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        @php
                            $time = date_create("$movie->release_date");
                            $added = false;
                            if (Auth::user()) {
                                $added = MovieController::checkAddedToWatchlist(Auth::user()->id, $movie->id);
                            }
                        @endphp
                        <div style="display: flex; justify-content: space-between">
                            <h6 class="card-subtitle text-muted">{{ date_format($time, 'Y') }}</h6>
                            @if (Auth::user() && Auth::user()->role == 'user' && $added)
                                <span style="color: green">&#10003;</span>
                            @elseif (Auth::user() && Auth::user()->role == 'user' && !$added)
                                <span>&#43;</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
