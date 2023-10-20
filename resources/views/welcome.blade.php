@extends('layouts.app')
@section('content')
<div class="main welcome">
    <div class="jumbotron p-5 mb-4 rounded-3">
        <div class="container py-2">
            <h1 class="text-center mb-7 welcome">Delive<span>boo</span></h1>
            <p class="text-center fs-1 fw-bold mt-5 mx-auto p-3 rounded-3"><span><a href="{{ route('register') }}" class="text-decoration-none">Registrati</a></span> e scopri tutte le funzionalità che offriamo <span>solo per te!</span></p>
        </div>
    </div>
</div>
@endsection