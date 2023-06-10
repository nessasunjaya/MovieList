@php
    use App\Http\Controllers\ActorController;
@endphp

@extends('layout.navbar')

@section('title', 'Actors')

@section('content')

    <div class="content text-center">
        <div class="header">
            <h3><span>|</span> Actors</h3>
            <div>
                <form class="d-flex" action="{{ url('searchActor') }}" method="POST">
                    {{csrf_field()}}
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search">
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <a href="{{ url('addactor') }}" class="btn btn-primary">Add</a>
                    @endif
                </form>
            </div>
        </div>

        <div class="items">
            @foreach ($actors as $actor)
                @php
                    $movie = ActorController::getActorMovie($actor->id);
                @endphp

                    <a href="{{ url('actor_detail/' . $actor->id) }}">
                        <div class="card m-3 mt-0 p-2">
                            <div class="text-center">
                                <img class="actor-cover" src="{{ $actor->image }}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title actor">{{ $actor->name }}</h5>
                                @if ($movie)
                                <h6 class="card-subtitle text-muted"> {{ $movie->movie->title }} </h6>
                                @else
                                <h6 class="card-subtitle text-muted"> no movie yet... </h6>
                                @endif
                                <div class="text-center">
                                    <a href="{{ url('actor_detail/' . $actor->id) }}">
                                        <button type="button" class="btn btn-primary m-5 mb-2 mt-4 w-50">Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
            @endforeach
        </div>
    </div>


@endsection
