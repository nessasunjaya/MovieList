@extends('layout.navbar')

@section('title', 'Login')

@section('content')

    <div style="margin-top: 150px"></div>
    <div class="w-50 m-auto">
        <form action="{{ url('login_user') }}" method="POST" class="m-5">
            {{ csrf_field() }}
            <h3 class="mb-5 text-center">Hello! Welcome back to <span>Movie</span>List!</h3>
            @if ($errors->any())
                <div class="alert alert-dismissible alert-danger mt-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control" placeholder="Please enter your email address" value="{{Cookie::get('cookie_email')!== null ? Cookie::get('cookie_email') : ''}}"/>
                <label class="form-label m-2" >Email address</label>
            </div>

            <div class="form-outline mb-2">
                <input type="password" name="password" class="form-control" placeholder="Please enter your password" value="{{Cookie::get('cookie_password')!== null ? Cookie::get('cookie_password') : ''}}"/>
                <label class="form-label m-2">Password</label>
            </div>
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label"> Remember me </label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary mb-4 w-75" type="submit">Login</button>
                <p>Don't have an account? <a href="{{url('register')}}"><span>Register now!</span></a></p>
            </div>
        </form>
    </div>

@endsection
