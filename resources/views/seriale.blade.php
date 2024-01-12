@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seriale</h1>
    <form action="{{route('search-seriale')}}" method="Post">
        <div class="row justify-content-center">

            @csrf
            <div class="col-md-3">
                <input type="text" name="search_seriale" class="form-control" placeholder="Kerko Seriale">
            </div>
            <div class="col-md-1">
                <button type="Submit" class="btn btn-outline-primary">Search</a>
            </div>
        </div>

    </form>

    <br>
    <div class="row">
        @foreach($seriale as $serial)
        <div class="col-md-3 mb-3">
            <div class="img-hover-zoom--blur" style="width: 18rem;">
                <img src="{{route('glide.serial', $serial->id)}}" width="500" height="400" class="card-img-top"
                    alt="{{ $serial->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $serial->title }}</h5>
                    <a href="{{ route('description.serial', ['id' => $serial->id]) }}"
                        class="btn btn-primary">Description</a>
                    @if(Auth::user()->is_admin===1)
                    @if(request()->is('delete'))
                    <form action="{{ route('delete.serial', ['id' => $serial->id]) }}" method="post"
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