@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('add.serial')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Shto Serial</h1>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Emri i serialit:</label>
            <input type="text" class="form-control" name="title" id="formGroupExampleInput">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Pershkrimi i serialit:</label>
            <input type="text" class="form-control" name="description" id="formGroupExampleInput2">
        </div>
        <br>
        <b>Zgjedh zhanret</b>
        <input type="checkbox" name="genres[]" value="action" id="action">
        <label for="action">Action</label>
        <input type="checkbox" name="genres[]" value="comedy" id="comedy">
        <label for="comedy">Comedy</label>
        <input type="checkbox" name="genres[]" value="horror" id="horror">
        <label for="horror">Horror</label>
        <input type="checkbox" name="genres[]" value="fantasy" id="fantasy">
        <label for="fantasy">Fantasy</label>
        <input type="checkbox" name="genres[]" value="sci-fi" id="sci-fi">
        <label for="sci-fi">Sci-Fi</label>
        <br>
        <br>
        <label for="image">Zgjedh foton</label>
        <br>
        <input type="file" name="filename" required>
        <a href="seriale">
            <button class="btn btn-primary">Shto serialin</button>
        </a>
    </form>
</div>
@endsection