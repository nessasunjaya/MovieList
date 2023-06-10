<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/storage/css/bootstrap.css">
    <link rel="stylesheet" href="/storage/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand title" href="{{ url('/') }}"><span>Movie</span>List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav" style="display: flex; justify-content: center; align-items: center">
                <li class="nav-item" style="margin-right: 10px">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                <li class="nav-item" style="margin-right: 10px">
                    <a class="nav-link" href="{{ url('/movies') }}">Movies</a>
                </li>
                <li class="nav-item" style="margin-right: 10px">
                    <a class="nav-link" href="{{ url('/actors') }}">Actors</a>
                </li>
                @auth
                    @if (Auth::user()->role == 'user')
                        <li class="nav-item" style="margin-right: 10px">
                            <a class="nav-link" href="{{ url('watchlist') }}">My Watchlist</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown" style="margin-right: 10px">
                        <div class="nav-link dropbtn" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><img src="{{ asset(Auth::user()->image_profile) }}"
                                style="width: 50px; height: 50px; border-radius: 50%" alt="profile">
                        </div>
                        <div class="dropdown-menu dropdown-content" id="dropdown-content">
                            <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <a href="/register"><button class="btn">Register</button></a>
                    <a href="/login"><button class="btn"
                            style="background-color: white; color: rgb(220, 63, 63); margin-left: 10px">Login</button></a>
                @endauth
            </ul>
        </div>
    </nav>
    <div style="margin-bottom: 90px"></div>

    @yield('content')

    <footer class="footer bg-dark p-5 text-center mt-auto">
        <p class="title"><span>Movie</span>List</p>
        <div style="margin-top: -20px"><span>Movie</span>List is a website which contains list of movies</div>
        <div class="pages">
            <div>Privacy Policy</div>
            <span>|</span>
            <div>Terms of Service</div>
            <span>|</span>
            <div>Contact Us</div>
            <span>|</span>
            <div>About Us</div>
        </div>
        <div>
            <p style="text-align: center">
                Copyright &copy; 2022 <span>Movie</span> List! All Rights Reserved
            </p>
        </div>
    </footer>

</body>

</html>
