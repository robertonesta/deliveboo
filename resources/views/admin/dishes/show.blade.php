@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8">
            @if (Str::contains($dish->photo, 'https'))
            <img class="w-100 rounded" src="{{$dish->photo}}" alt="">
        @else
            <img class="w-100 rounded" src="{{ asset('storage/' .$dish->photo)}}" alt="...">
        @endif
        </div>
        <div class="col-4">
            <div>
                <h2 class="fs-1 fw-bold text-white pb-4">{{$dish->name}}</h2>
            </div>
            <div>
                <div class="fs-6 py-3">
                    <h4>Descrizione</h4>
                    <p class="fst-italic">{{$dish->description}}</p>
                </div>
                <div class="fs-6 py-3">
                    <h4>Ingredienti</h4>
                    <p class="fst-italic">{{$dish->ingredients}}</p>
                </div>
                <div class="fs-6 py-3">
                    <h4>Prezzo</h4>
                    <p class="fst-italic">€{{$dish->price}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection