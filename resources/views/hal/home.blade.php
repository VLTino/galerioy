@extends('layouts.main')

@section('content')
    <div class="container mb-5 mt-5">

        <!-- Gambar 1 -->
        <div class="gallery-item">
            @foreach ($posts as $post)

            <div class="gambar"> <a href="/detail/{{ $post->id_photo }}"><img src="\storage\img\{{ $post->gambar }}"></a></div>
                
            @endforeach


        </div>


    </div>
@endsection
