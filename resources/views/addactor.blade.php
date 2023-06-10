@extends('layout.navbar')

@section('title', 'Add Actor')

@section('content')

    <div style="margin-top: 150px"></div>
    <div class="w-75 m-auto">
        <form style="margin-bottom: 100px" action="{{ url('add_actor/') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="">Add <span>Actor</span></h3>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="form-outline mb-2">
                <label class="form-label m-2">Name</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Gender</label>
                <select class="form-control" name="gender">
                    <option value="" selected disabled hidden>-- Open this select menu --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Biography</label>
                <textarea class="form-control" cols="30" rows="5" name="biography"></textarea>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Date of Birth</label>
                <input type="date" class="form-control" value="" name="birthdate" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Place of Birth</label>
                <input type="text" class="form-control" name="place_of_birth"/>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Image URL</label>
                <input type="file" class="form-control" name="image" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Popularity</label>
                <input type="number" class="form-control" min=1 max=100 name="popularity"/>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4 w-100">Create</button>
            </div>
        </form>
    </div>

@endsection
