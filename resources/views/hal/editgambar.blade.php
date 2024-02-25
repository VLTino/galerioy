@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}


    /* Styling untuk tombol input file */
    .custom-file-input {
      display: none;
    }

    .custom-file-label {
      background-color: #007BFF;
      color: #fff;
      border: 1px solid #007BFF;
      border-radius: 5px;
      padding: 8px 12px;
      cursor: pointer;
      display: inline-block;
    }

</style>
@include('layouts.sidebar')

@section('content')
<div class="content container mt-5">
    <div class="header col-12"><h1>Edit</h1></div>

    <div class="container d-flex justify-content-center align-items-center detail">
        <img src="\storage\img\{{ $post->gambar }}" alt="" class="img-detail img-fluid">
    </div>
    
    <form action="/edit/{{ $post->id_photo }}" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <input type="hidden" name="userid" value="{{ Auth::user()->userid }}">
        <input type="hidden" name="like_post" value="0">
        <input type="file" name="gambar" class="custom-file-input" id="fileInput" value="{{ $post->gambar }}">
        <label for="fileInput" class="custom-file-label">Change</label>
        <textarea name="describe_photo" id="" cols="30" rows="10" class="form-control">{{ $post->describe_photo }}</textarea>
        <button type="submit" class="btn btn-success form-control">Upload</button>
    </div>      
    </form>
</div>
@endsection