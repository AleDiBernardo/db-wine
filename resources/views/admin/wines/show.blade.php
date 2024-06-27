@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">

                <h2 class="m-0">{{$wine->wine}}</h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.wines.edit', ['wine' => $wine->slug]) }}"
                        class="btn btn-warning fw-bold text-light">Edit</a>
                    <form action="{{ route('admin.wines.destroy', ['wine' => $wine->slug]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn fw-bold btn-danger"
                            onclick="return confirm('Are you sure you want to delete this comic?')">Delete</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-4 my-3">
                <img class="rounded-3 img-fluid" src="{{asset($wine->image)}}" alt="">
            </div>
    
            <div class="col-12 col-md-8 my-3">
                <ul class="list-unstyled">
                    <li><strong>Cantina: </strong> {{$wine->winery}}</li>
                    <li><strong>Località: </strong> {{$wine->location}}</li>
                    <li><strong>Genere: </strong> {{ucfirst( $wine->genre)}}</li>
                    <li><strong>Recensioni: </strong> {{$wine->review ?: 'N/D' }}</li>
                    <li><strong>Media: </strong> {{$wine->average ?: 'N/D' }}</li>

                </ul>
            </div>
        </div>

    </div>
@endsection