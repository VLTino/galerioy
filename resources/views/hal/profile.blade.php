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
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="header col-12">
            <h1>Profile</h1>
        </div>

        <div class="container d-flex justify-content-center align-items-center detail">
            @if($user && $user->photo_profile)
                <img src="\storage\profile_photos\{{ $user->photo_profile }}" alt="" class="img-detail img-fluid">
            @else
                <!-- Display a default image or message if $user is null -->
                <img src="/default/pp.jpg" alt="Default Image" class="img-detail img-fluid">
            @endif
        </div>

        <form action="/editprofile/{{ $user->profileid }}" method="post" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="userid" value="{{ Auth::user()->userid }}">
                @error('photo_profile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="file" name="photo_profile" class="custom-file-input" id="fileInput" value="{{ $user->link_acc }}" onchange="displayFileName()">
                <label for="fileInput" class="custom-file-label" id="fileLabel">Change</label>

                <script>
                    function displayFileName() {
                        var input = document.getElementById('fileInput');
                        var label = document.getElementById('fileLabel');
                        var fileName = input.files[0].name;
                        label.innerHTML = fileName;
                    }
                </script>
                 @error('link_acc')
                 <div class="alert alert-danger">{{ $message }}</div>
             @enderror
                <input type="text" name="link_acc" id="" value="{{ $user->link_acc }}" class="form-control" placeholder="web link">
                @error('describe_photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea name="describe_profile" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi Profile">{{ $user->describe_profile }}</textarea>
                <button type="submit" class="btn btn-success form-control">Upload</button>
            </div>
        </form>
    </div>
@endsection
