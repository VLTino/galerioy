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
    <h1>Galeriku</h1>
    <div class="gallery-item2">
        @foreach ($posts as $post)

        <div class="gambar"> <a href="/galeriku/detail"><img src="\storage\img\{{ $post->gambar }}"></a></div>
            
        @endforeach
    </div>
</div>
@endsection