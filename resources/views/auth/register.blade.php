@extends('layouts.app')

@section('content')
<main class="login register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-around py-3">
                    <div class="message text-center d-none text-danger"></div>
                    <input type="button" id="close" value="Chiudi" class="d-none">
                </div>
                <div class="card w-75 mx-auto">
                    <div class="card-header fs-2 fw-bold text-center">Registrati</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="pt-3">
                            @csrf
    
                            <div class="mb-4 row justify-content-center">
                                <div class="col-md-6">
                                    <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
  
                                <div class="col-md-6">
                                    <input placeholder="Lastname" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
    
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">

                                <div class="col-md-6">
                                    <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
    
                                <div class="col-md-6">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
    
                                <div class="col-md-6">
                                    <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center mb-0">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn fs-1 d-inline">
                                        Registrati
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@vite(['resources/js/registration.js'])
@endsection