@extends('layout.navbar')

@section('title', $actor->name)

@section('content')
    <div style="display: flex; justify-content: center;" class="m-5">
        <div class="w-25 mt-5">
            <img class="item-cover text-center" style="width: 15vw; height: 22vw;" src="{{ url($actor->image) }}" alt="">
            <h5 class="pt-3">Personal <span>Info</span></h3>
            <h6 class="">Popularity</h5>
            <h6 class="text-muted">{{ $actor->popularity }}</h6>
            <h6 class="">Gender </h5>
            <h6 class="text-muted">{{ $actor->gender }}</h6>
            <h6 class="">Birthday </h5>
            <h6 class="text-muted">{{ $actor->birthdate }}</h6>
            <h6 class="">Place of Birth </h5>
            <h6 class="text-muted">{{ $actor->place_of_birth }}</h6>
        </div>
        <div class="w-50 mt-5">
            <h3 class="fw-bolder">{{ $actor->name }}</h3>
            @if ( Auth::user() && Auth::user()->role == 'admin')
            <form action="{{ url('delete_actor/'.$actor->id) }}" method="POST">
                <a class="btn btn-primary" href="{{url('editactor/'.$actor->id)}}" class="m-3">Update</a>
                {{csrf_field()}}
                <button type="submit" class="btn">Delete</button>
            </form>
            @endif
            <h5 class="mt-3"><span>Biography</span></h5>
            <h6>{{ $actor->biography }}</h6>
            <h5><span>Known For</span></h5>
            <div style="display: flex">
                @foreach ($actor->movieplayed as $actor)
                    <a href="{{ url('movie_detail/' . $actor->movie->id) }}">
                        <div class="m-2">
                            <div class="card">
                                <div class="text-center">
                                    <img class="item-cover" src="{{ url($actor->movie->thumbnail_image) }}" alt="">
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <h5 class="card-title">{{ $actor->movie->title }}</h5>
                                <h6 class="card-subtitle text-muted">{{ $actor->movie->release_date }}</h6>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
