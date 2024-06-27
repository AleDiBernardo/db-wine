@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit: {{$wine->wine}}</h1>

    @include('partials.errors')

    <form action="{{ route('admin.wines.update', ['wine'=>$wine->slug]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="wine" class="form-label">Name</label>
            <input type="text" class="form-control" id="wine" aria-describedby="wine" value="{{ old('wine', $wine->wine) }}" name="wine">
        </div>
        <div class="mb-3">
            <label for="winery" class="form-label">Winery</label>
            <input type="text" class="form-control" id="winery" aria-describedby="winery" value="{{ old('winery', $wine->winery) }}" name="winery">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select id="genre" name="genre" class="form-select" aria-label="genre">
                <option selected value=""></option>
                <option value="red">Red</option>
                <option value="white">White</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" aria-describedby="location" value="{{ old('location', $wine->location) }}" name="location">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Link</label>
            <input type="text" class="form-control" id="image" aria-describedby="image" value="{{ old('image', $wine->image) }}" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection