@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{URL::to('/images/'.$movie->filename)}}" width="300" height="400  class=" card-img-top">
    <h1>{{ $movie->title }} Description</h1>
    <p>{{ $movie->description }}</p>
    <button>Watch Movie</button>
</div>
@endsection