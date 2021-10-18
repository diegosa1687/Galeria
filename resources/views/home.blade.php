@extends('layouts.app')

@section('content')
<div class="body">
    <div class="card-columns">
        @foreach($files as $image)
            <div class="card text-white bg-dark">
                <img src="{{ url("storage/img/" . $image) }}" class="card-img" alt="{{ $image }}" style="width: 100%; height: 100%;">
                <div class="card-img-overlay">
                    <div class="card-buttons">
                        <button type="button" class="button button-card" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fas fa-caret-down"></i></span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ url("storage/img/" . $image) }}" class="dropdown-item" download>Download</a>
                            <a href="{{ route('delete', $image) }}" class="dropdown-item">Apagar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection