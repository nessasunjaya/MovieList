@extends('layout.navbar')

@section('title', 'Movies')

@section('content')

    <div class="content text-center">
        <div class="header">
            <h3> <span>|</span> Movies</h3>
            <div style="display: flex">
                <form class="d-flex" action="{{ url('searchMovie') }}" method="POST">
                    {{csrf_field()}}
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search">
                    @if (Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{url('addmovie')}}" class="btn btn-primary" style="padding-top: 10px">Add</a>
                    @endif
                </form>
            </div>
        </div>

        <div class="items">
            @foreach ($movies as $movie)
                <a href="{{ url('movie_detail/'.$movie->id) }}">
                    <div class="m-2">
                        <div class="card">
                            <div class="text-center">
                                <div class="item-cover" style="background-image: url({{ $movie->thumbnail_image }})">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            @php
                                $time = date_create("$movie->release_date");
                            @endphp
                            <h6 class="card-subtitle text-muted">{{ date_format($time, 'Y') }}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
