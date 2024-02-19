@extends('layouts.main')



@section('content')
    <div class="container mt-5">
        <form action="/reg" method="post">
            @csrf
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                        <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="name" class="form-control form-control-lg"
                                                placeholder="Name" name="name" autofocus/>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="email" id="typeEmailX" class="form-control form-control-lg"
                                                placeholder="Email" name="email" />
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                           
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="typePasswordX" class="form-control form-control-lg"
                                                placeholder="Password" name="password" />
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="confirmpassword" class="form-control form-control-lg"
                                                placeholder="Confirm Password" name="confirm_password" />
                                                @error('confirm_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                          
                                        </div>
                                        
                                        <input type="hidden" name="level" id="" value="user">


                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>


                                    </div>

                                    <div>
                                        <p class="mb-0">Have a account?<a href="/login" class="text-white-50 fw-bold">
                                                Login</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
