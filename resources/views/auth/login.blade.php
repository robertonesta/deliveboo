@extends('layouts.app')

@section('content')
<main class="login register pt-5">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-50 mx-auto">
                    <div class="card-header fs-2 fw-bold text-center">Accedi</div>
    
                    <div class="card-body pt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="mb-4 row justify-content-center">
                               <!--  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
    
                                <div class="col-md-6 w-75 mx-auto">
                                    <input placeholder="Indirizzo email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
                        <!--         <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
    
                                <div class="col-md-6 w-75 mx-auto">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <div class="col-md-6 mx-auto">
                                    <div class="form-check d-flex justify-content-center align-items-center gap-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label mt-1 fs-5" for="remember">
                                            {{ __('Ricordamelo') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="mb-4 row mb-0">
                                <div class="col-md-8 mx-auto text-center">
                                    <button id="login" type="submit" class="btn fs-1 mb-3">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                    <a id="forgot" class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                    @endif
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
