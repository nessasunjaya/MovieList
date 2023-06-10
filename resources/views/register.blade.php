@extends('layout.navbar')

@section('title', 'Register')

@section('content')

    <div style="margin-top: 150px"></div>
    <div class="w-50 m-auto">
        <form class="m-5" action="{{ url('register_user/') }}" method="POST">
            {{csrf_field()}}
            <h3 class="mb-5 text-center">Hello! Welcome to <span>Movie</span>List!</h3>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="form-outline mb-4">
                <input type="text" class="form-control" placeholder="Please enter your username" name="username" />
                <label class="form-label m-2">Username</label>
            </div>

            <div class="form-outline mb-4">
                <input type="email" class="form-control" placeholder="Please enter your email address" name="email" />
                <label class="form-label m-2">Email address</label>
            </div>

            <div class="form-outline mb-2">
                <input type="password" class="form-control" placeholder="Please enter your password" name="password" />
                <label class="form-label m-2">Password</label>
            </div>

            <div class="form-outline mb-2">
                <input type="password" class="form-control" placeholder="Please enter your confirmation password"
                    name="password_confirmation" />
                <label class="form-label m-2">Confirmation Password</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary m-4 w-75">Register</button>
                <p>Already have an account? <a href="{{ url('login') }}"><span>Login now!</span></a></p>
            </div>
        </form>
    </div>

@endsection
