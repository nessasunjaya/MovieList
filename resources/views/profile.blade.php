@extends('layout.navbar')

@section('title', Auth::user()->username)

@section('content')

    <div style="margin-top: 150px"></div>
    <div class="w-75 m-auto" style="display: flex">
        <div class="w-25 text-center">
            <h3 class="">My <span>Profile</span></h3>
            <img src="{{ asset(Auth::user()->image_profile) }}" alt="Profile Picture" style="border-radius: 50%; width: 15vw">
            <h5 class="pt-3">{{ Auth::user()->username }}</h5>
            <h6 class="text-muted">{{ Auth::user()->email }}</h6>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal">
                Update Image
            </button>
        </div>
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Image</h5>
                    </div>
                    <form action="{{ url('edit_user_profile/'.Auth::user()->id) }}" method="POST">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="image">
                            <small class="form-text text-muted">Please upload image to other sources first and use the
                                URL</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form class="w-75" style="margin-bottom: 100px; margin-left: 100px" action="{{ url('edit_user/'.Auth::user()->id) }}"
            method="POST">
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
            {{ csrf_field() }}
            <h3 class="">Update <span>Profile</span></h3>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="username" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Email</label>
                <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">DOB</label>
                <input type="date" class="form-control" value="{{ Auth::user()->date_of_birth }}"
                    name="date_of_birth" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label m-2">Phone</label>
                <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4 w-100">Save Changes</button>
            </div>
        </form>
    </div>

@endsection
