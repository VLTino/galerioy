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
        <div class="header col-12">
            <h1>Profile</h1>
        </div>

        <div class="container d-flex justify-content-center align-items-center detail">
            @if($user && $user->photo_profile)
                <img src="\storage\img\{{ $user->photo_profile }}" alt="" class="img-detail img-fluid">
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
                <input type="file" name="photo_profile" class="custom-file-input" id="fileInput" onchange="displayFileName()">
                <label for="fileInput" class="custom-file-label" id="fileLabel">Change</label>

                <script>
                    function displayFileName() {
                        var input = document.getElementById('fileInput');
                        var label = document.getElementById('fileLabel');
                        var fileName = input.files[0].name;
                        label.innerHTML = fileName;
                    }
                </script>
                @error('describe_photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea name="describe_photo" id="" cols="30" rows="10" class="form-control">{{ $user ? $user->describe_profile : 'Data not filled yet' }}</textarea>
                <button type="submit" class="btn btn-success form-control">Upload</button>
            </div>
        </form>
    </div>
@endsection
