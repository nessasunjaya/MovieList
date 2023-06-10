@extends('layout.navbar')

@section('title', 'Edit Movie')

@section('content')

    <script>
        $(document).ready(function() {
            var max_actor = {{$actor_count}};
            var actor_wrapper = $(".actor_container");
            var add_button = $(".add_actor");

            var actor_counter = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (actor_counter < max_actor) {
                    actor_counter++;
                    $(actor_wrapper).append(
                        '<div class="items"> <div class="w-50"> <label class="form-label m-2">Actor '+ actor_counter + '</label> <select name="actor_id_'+ actor_counter +'" class="form-control"> <option value="0" selected disabled hidden>-- Select an Option --</option> @foreach ($actors as $actor) <option value="{{$actor->id}}">{{$actor->name}}</option> @endforeach </select> </div> <div class="w-50"> <label class="form-label m-2">Character Name</label> <input type="text" class="form-control" name="character_name_' + actor_counter + '" /> </div> </div>'
                    );
                } else {
                    alert('Maximum ' + {{$actor_count}} + ' actors!')
                }
            });

            var max_genre = {{$genre_count}};
            var genre_wrapper = $(".genre_container");
            var add_genre = $(".add_genre");

            var genre_counter = 1;
            $(add_genre).click(function(e) {
                e.preventDefault();
                if (genre_counter < max_genre) {
                    genre_counter++;
                    $(genre_wrapper).append(
                        '<select name="genre_' + genre_counter + '" id="" class="form-control mt-4"> <option value="0" selected disabled hidden>-- Select an Option --</option> @foreach ($genres as $genre) <option value="{{$genre->id}}">{{$genre->name}}</option> @endforeach </select>'
                    );
                } else {
                    alert('Maximum ' + {{$genre_count}} + ' genre!')
                }
            });
        });
    </script>

    <div style="margin-top: 150px"></div>
    <div class="w-75 m-auto">
        <form style="margin-bottom: 100px" action="{{ url('edit_movie/'.$movie->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="">Edit <span>Movie</span></h3>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="form-outline mb-2">
                <label class="form-label m-2">Title</label>
                <input type="text" class="form-control" name="title" value="{{$movie->title}}" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Description</label>
                <textarea class="form-control" cols="30" rows="5" name="description">{{$movie->description}}</textarea>
            </div>

            <div class="form-outline mb-2">
                <label>Genres</label>
                <div class="genre_container">
                    <select name="genre_1" id="" class="form-control mt-2">
                        <option value="0" selected disabled hidden>-- Select an Option --</option>
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="add_genre btn btn-primary mt-4 w-5">Add Genre</button>
            </div>

            <div class="form-outline mb-2">
                <label>Actors</label>
                <div class="actor_container">
                    <div class="items">
                        <div class="w-50">
                            <label class="form-label m-2">Actor 1</label>
                            <select name="actor_id_1" class="form-control">
                                <option value="0" selected disabled hidden>-- Select an Option --</option>
                                @foreach ($actors as $actor)
                                <option value="{{$actor->id}}">{{$actor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-50">
                            <label class="form-label m-2">Character Name</label>
                            <input type="text" class="form-control" name="character_name_1" />
                        </div>
                    </div>
                </div>
                <button class="add_actor btn btn-primary mt-4 w-5">Add Actor </button>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Director</label>
                <input type="text" class="form-control" name="director" value="{{$movie->director}}" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Release Date</label>
                <input type="date" class="form-control" name="release_date" value="{{$movie->release_date}}" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Image URL</label>
                <input type="file" class="form-control" name="thumbnail_image" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Background URL</label>
                <input type="file" class="form-control" name="background_image" />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4 w-100">Update</button>
            </div>
        </form>
    </div>

@endsection
