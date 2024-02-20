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
                    <form action="" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnfav btn-lg mr-2">
                            <i class="fa-regular fa-bookmark"></i>
                        </button>
                    </form>

                    <form action="" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btnshare btn-lg mr-2">
                            <i class="fa-regular fa-share-from-square"></i>
                        </button>
                    </form>
                </div>

                <div class="row d-flex justify-content-center align-items-center mt-3">
                    <div class="col-lg-2 d-flex justify-content-center">
                        <img src="/img/tokyo3.jpg" alt="" srcset="" style="border-radius: 50%;width:50px;height:50px;" class="img-fluid">
                    </div>
                
                    <div class="col-lg-3 d-flex justify-content-center">
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
@endsection
