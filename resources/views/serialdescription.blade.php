@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{URL::to('/images/'.$serial->filename)}}" width="300" height="400  class=" card-img-top">
    <h1>{{ $serial->title }} Description</h1>
    <p>{{ $serial->description }}</p>
    <button>Shiko Serialin</button>
</div>
@endsection