@php
    use App\Http\Controllers\MovieController;
@endphp

@extends('layout.navbar')

@section('title', $movie->title)

@section('content')
    <div class="background" style="background-image: url('{{ asset($movie->background_image) }}')"></div>
    <div class="container">
        <div class="carousel-caption text-start" style="display: flex; justify-content: center; align-content: center">
            <div>
                <img src="{{ url($movie->thumbnail_image) }}" alt="{{ $movie->thumbnail_image }}"
                    style="width: 21vw; border-radius: 20px">
            </div>
            <div style="margin-left: 25px" class="mt-5">
                @php
                    $time = date_create("$movie->release_date");
                    $added = false;
                    if (Auth::user()) {
                        $added = MovieController::checkAddedToWatchlist(Auth::user()->id, $movie->id);
                    }
                @endphp
                @foreach ($movie->moviegenre as $genre)
                    <button class="btn btn-primary"
                        style="pointer-events: none; background-color: rgba(255, 255, 255, 0.5); color: black">{{ $genre->genre->name }}</button>
                @endforeach
                <h1>{{ $movie->title }} ({{ date_format($time, 'Y') }}) </h1>
                <p>{{ $movie->description }}</p>
                <p>a movie by <span>{{ $movie->director }}</span></p>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <a class="btn btn-primary" href="{{ url('editmovie/' . $movie->id) }}" class="m-3">Update</a>
                    <a class="btn btn-primary" href="{{ url('deletemovie/' . $movie->id) }}">Delete</a>
                @endif
                @auth
                    @if (Auth::user() && Auth::user()->role == 'user' && !$added)
                        <form action=" {{ url('add_to_watchlist/'.Auth::user()->id.'/'.$movie->id) }} " method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-lg btn-primary" type="submit"> <b>&#43;</b> Add to Watchlist</button>
                        </form>
                    @elseif (Auth::user() && Auth::user()->role == 'user' && $added)
                        <form action="{{ url('remove_from_watchlist/'.Auth::user()->id.'/'.$movie->id) }}" method="POST">
                            {{csrf_field()}}
                            <button class="btn btn-lg btn-primary" type="submit"
                                style="background-color: white; color: rgb(220, 63, 63)"> <b>
                                    &#128465;</b> Remove from Watchlist</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="header">
        <h3><span>|</span> Cast</h3>
    </div>
    <div style="display: flex">
        @foreach ($cast as $c)
            <div class="card m-3 mt-0 p-2">
                <div class="text-center">
                    <img class="actor-cover" src="{{ url($c->actor->image) }}" alt="{{ $c->actor->image }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title actor">{{ $c->actor->name }}</h5>
                    <h6 class="card-subtitle text-muted">as <span class="primary">{{ $c->character_name }}</span></h6>
                    <div class="text-center">
                        <a href="/actor_detail/{{ $c->actor->id }}">
                            <button type="button" class="btn btn-primary m-5 mb-2 mt-4 w-50">Detail</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="header ">
        <h3><span>|</span> More</h3>
    </div>
    <div class="items mb-5">
        @foreach ($movies as $movie)
            <a href="{{ url('movie_detail/' . $movie->id) }}">
                <div class="m-2">
                    <div class="card">
                        <div class="text-center">
                            <div class="item-cover" style="background-image: url('{{ asset($movie->thumbnail_image) }}')">
                                {{-- <h1>{{ $movie->thumbnail_image }}</h1> --}}
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
