@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Wines</h1>
            
            <div class="d-flex flex-column">
                <a href="{{route('admin.wines.create')}}" class="btn btn-primary fw-bold">Add New </a>
        <span class="fw-bold">Total row: <?= count($winesList)?> </span>

            </div>
            
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Wine</th>
                    <th scope="col">Review</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Average</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($winesList as $wine)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $wine->wine }}</td>
                        <td>{{ $wine->review }}</td>
                        <td>{{ $wine->genre }}</td>
                        <td>{{ $wine->average }}</td>
                        <td>{{ $wine->average }}</td>

                        {{-- Kejdi doveva fare tutto il progetto --}}

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.wines.show', ['wine' => $wine->id]) }}"
                                    class="btn btn-success fw-bold text-light">Details</a>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div>{{ $winesList->links() }}</div>

@endsection
