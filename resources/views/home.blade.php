@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="">
@endsection

@section('content')
<div class="body" style="padding: 20px;">
    <div class="row row-cols-1 row-cols-md-3">
        @foreach($files as $image)
        <div class="col mb-4">
            <div class="card h-100">
                <img src="{{ url("storage/img/" . $image) }}" class="card-img-top img" alt="{{ $image }}" style="max-width: 100%; width: auto; height: 280px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-text">{{ $image }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ url("storage/img/" . $image) }}" class="btn btn-primary" download>Download</a>
                    <a href="{{ route('delete', $image) }}" class="btn btn-danger">Apagar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('message'))   
<div id="message-alert" class="alert alert-dark" role="alert">
    @if (session('message') == 'Upload realizado com sucesso!')
        <i class="fas fa-check-circle check"></i>
    @else
        <i class="fas fa-times-circle times"></i>
    @endif
    {{ session('message') }}
</div>
@endif
@endsection

@section('script')
<script>
$("#message-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#message-alert").slideUp(500);
});
</script>
@endsection