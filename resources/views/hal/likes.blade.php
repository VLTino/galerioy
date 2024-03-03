@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
<div class="content mt-5">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>Galeriku</h1>
    <!-- Gambar 1 -->
    @if ($posts->count() > 0)
    <div class="gallery-item2">
        @foreach ($posts as $post)
            <div class="gambar">
                <a href="/detail/{{ $post->gambar }}">
                    <img src="\storage\img\{{ $post->gambar }}">
                </a>
            </div>
        @endforeach
    </div>
    @else
    <div class="d-flex justify-content-center align-content-center text-danger">
        <h1 style="width: 100%;text-align: center">No Images Found</h1>
    </div>
@endif
</div>
@endsection