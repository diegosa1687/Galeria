@extends('layouts.app')

@section('content')
<div class="body" style="padding: 20px;">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($files as $image)
        <div class="col mb-4">
            <div class="card text-white bg-dark">
                <img src="{{ url("storage/img/" . $image) }}" class="card-img img" alt="{{ $image }}" style="max-width: 100%; width: auto; height: 280px; object-fit: cover;">
                <div class="card-img-overlay">
                    <div class="card-buttons">
                        <a href="{{ url("storage/img/" . $image) }}" class="btn btn-outline-light rounded-pill" download>Download</a>
                        <a href="{{ route('delete', $image) }}" class="btn btn-outline-light rounded-pill">Apagar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection