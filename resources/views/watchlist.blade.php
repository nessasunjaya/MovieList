@extends('layout.navbar')

@section('title', 'My Watchlist')

@section('content')
    <div class="content">
        <div class="header">
            <h3> <span>|</span> My Watchlist</h3>
            <div>
                <form class="d-flex" action="{{ url('searchMovieWatchlist') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="search">
                </form>
            </div>
        </div>

        <div style="margin-left: 20px; display: flex;">
            <form action="{{ url('searchStatus/all') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn" style="background-color: rgb(90, 90, 90); margin-right: 10px">All</button>
            </form>
            <form action="{{ url('searchStatus/planned') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn" style="background-color: rgb(90, 90, 90); margin-right: 10px">Planned</button>
            </form>
            <form action="{{ url('searchStatus/watching') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn" style="background-color: rgb(90, 90, 90); margin-right: 10px">Watching</button>
            </form>
            <form action="{{ url('searchStatus/finished') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn" style="background-color: rgb(90, 90, 90); margin-right: 10px">Finished</button>
            </form>
        </div>

        <div style="display: flex">
            @if ($watchlists)
                @foreach ($watchlists as $w)
                    <div class="mt-5 text-center">
                        <div class="card m-3 mt-0 p-2" style="width: 15vw;">
                            <div class="text-center">
                                <img style="width: 12vw;" src="{{ url($w->movie->thumbnail_image) }}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $w->movie->title }}</h5>
                                <h6 class="card-subtitle text-muted"><span class="primary"> {{ $w->status }} </span>
                                </h6>
                                <div class="mt-3 text-center">
                                    <button type="button" data-movieid="{{ $w->movie->id }}" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#actionModal{{ $w->movie->id }}"
                                        id="action">
                                        Action
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="modal fade" id="actionModal{{ $w->movie->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="actionModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Change Status</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('update_watchlist/'.$w->movie->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-outline mb-2">
                                                    <select name="status" id="" class="form-control">
                                                        <option value="Planned" selected>Planned</option>
                                                        <option value="Watching">Watching</option>
                                                        <option value="Finished">Finished</option>
                                                        <option value="Removed">Remove</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#actionModal'+{{$w->movie->id}}).on('shown.bs.modal', function() {
                            var movieid = $('#action').data('movieid')
                            var modal = $('#actionModal'+{{$w->movie->id}})
                        })
                    </script>
                @endforeach
            @else
                <h3>Watchlist empty, please add a movie to watchlist...</h3>
            @endif
        </div>

        <div class="m-5 c-flex text-center">
            {{ $watchlists->withQueryString()->links() }}
        </div>
    </div>

@endsection
