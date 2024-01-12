@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>
    @if(Auth::user()->has_premium===1)
    <p>Premium</p>
    @endif
    <form action="{{ route('search') }}" method="Post">
        <div class="row justify-content-center">
            @csrf
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search Movie">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </div>
    </form>

    <br>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="img-hover-zoom--blur"> <img src="{{ route('glide.movie', $movie->id) }}" width="500"
                        height="400" class="card-img-top w-100s">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <a href="{{ route('descriptionMovie', ['id' => $movie->id]) }}"
                        class="btn btn-primary">Description</a>
                    @if(Auth::user()->is_admin===1)
                    @if(request()->is('delete'))
                    <form action="{{ route('delete.movie', ['id' => $movie->id]) }}" method="post"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        @else
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection