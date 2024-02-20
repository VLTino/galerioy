@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
<div class="content container mt-5">
    <div class="header col-12"><h1>Upload</h1></div>
    
    <form action="/upload" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <input type="hidden" name="userid" value="{{ Auth::user()->userid }}">
        <input type="hidden" name="like_post" value="0">
        <input type="file" name="gambar" id="" class="form-control">
        <textarea name="describe_photo" id="" cols="30" rows="10" class="form-control"></textarea>
        <button type="submit" class="btn btn-success form-control">Upload</button>
    </div>      
    </form>
</div>
@endsection