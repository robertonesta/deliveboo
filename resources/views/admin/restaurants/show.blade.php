@extends('layouts.admin')
@section('content')

    
    
    <div class="card text-center" style="width: 18rem;">
        @if (Str::contains($restaurant->photo, 'photo'))
                    <img src=" {{ asset('storage/' .$restaurant->photo)}}" class="card-img-top" alt="...">
                    @else
                    <img class="card-img-top rounded" src="{{ asset('storage/' .$restaurant->photo)}}" alt="">
                    @endif
        <div class="card-body">
            <h5 class="card-title"> {{ $restaurant->name }}</h5>
            <p class="card-text">{{ $restaurant->address }}</p>
            <p class="card-text"> <strong>Partita iva: </strong>{{ $restaurant->piva }}</p>
        </div>
        
        <div class="card-body">
            <a href="{{route('admin.restaurants.edit', $restaurant)}}" class="card-link">Modifica</a>
        
        </div>
    </div>
    
    @endsection