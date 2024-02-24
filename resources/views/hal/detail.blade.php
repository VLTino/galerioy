@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center detail">
        <img src="\storage\img\{{ $post->gambar }}" alt="" class="img-detail img-fluid">
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="d-flex justify-content-center align-items-center">
                    <!-- Like Button -->
                    <form action="" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnheart btn-lg mr-2">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </form>

                    <!-- Favorite Button Form -->
                    {{-- <form action="" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnfav btn-lg mr-2">
                            <i class="fa-regular fa-bookmark"></i>
                        </button>
                    </form> --}}

                    
                        @csrf
                        <button id="shareButton" class="btn btnshare btn-lg mr-2">
                            <i class="fa-regular fa-share-from-square"></i>
                        </button>
                    
                    @if (Auth::user()->userid == $post->userid)
                    <form action="/edit/{{ $post->gambar }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnfav btn-lg mr-2">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </form>

                    <form action="/delete/{{ $post->id_photo }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnheart btn-lg mr-2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                        
                    @elseif (Auth::user()->level == "admin")
                    <form action="/edit/{{ $post->gambar }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnfav btn-lg mr-2">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </form>

                    <form action="/delete/{{ $post->id_photo }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnheart btn-lg mr-2">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>

                    @endif
                </div>

                <div class="row d-flex justify-content-center align-items-center mt-3">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <img src="/img/tokyo3.jpg" alt="" srcset="" style="border-radius: 50%;width:50px;height:50px;" class="img-fluid">
                    </div>
                
                    <div class="col-lg-12 d-flex justify-content-center">
                        <h5>{{ $post->user->name }}</h5>
                    </div>
                </div>

                <div class="describe mb-5 mt-3 d-flex justify-content-center align-items-center">
                    
                        <div class="">
                            <p>{{ $post->describe_photo }}</p>
                        </div>
                    
                </div>

                <!-- Comment Section -->
                <div class="mb-3">
                    <h5>Comments</h5>
                    <!-- Add your comment input field and submit button here -->
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="comment" class="form-control" placeholder="Add a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>

                

                <!-- Display Comments -->
                <div>
                    <!-- Loop through and display comments -->
                    {{-- @foreach ($comments as $comment)
                    <div class="mb-2">
                        <strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}
                    </div>
                @endforeach --}}

                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center mt-3">
            <div class="col-lg-1 comment-profil">
                <img src="/img/tokyo3.jpg" alt="" srcset="" class="img-fluid">
            </div>
        
            <div class="col-lg-10">
                <h5>User Name</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore corporis iure non iusto pariatur quas eos, quos illo tempora quod minima, nesciunt vitae inventore corrupti voluptas facere suscipit ut! Blanditiis expedita iusto dolores nesciunt minima consequuntur facilis ipsa, debitis sunt non ratione, odio officia dolore sed inventore consequatur aut! Corrupti?</p>
            </div>
        </div>
        
    </div>

    <script>
        // Fungsi untuk menyalin link ke clipboard
        function copyToClipboard() {
          // Mengambil elemen input atau textarea dengan value berisi link yang ingin disalin
          const linkInput = document.createElement('input');
          const linkText = window.location.href;
    
          // Menambahkan link ke elemen input
          linkInput.value = linkText;
    
          // Menambahkan elemen input ke body
          document.body.appendChild(linkInput);
    
          // Memilih dan menyalin teks di dalam elemen input
          linkInput.select();
          document.execCommand('copy');
    
          // Menghapus elemen input setelah disalin
          document.body.removeChild(linkInput);
    
          // Pemberitahuan bahwa link berhasil disalin (opsional)
          alert('Link has been copied to clipboard: ' + linkText);
        }
    
        // Menambahkan event listener pada tombol
        const shareButton = document.getElementById('shareButton');
        shareButton.addEventListener('click', copyToClipboard);
      </script>
@endsection
