@extends('layouts.admin')
@section('content')

    
    
    <div class="card text-center" style="width: 18rem;">
        <img src=" {{ $restaurant->photo }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"> {{ $restaurant->name }}</h5>
            <p class="card-text">{{ $restaurant->address }}</p>
            <p class="card-text"> <strong>Partita iva: </strong>{{ $restaurant->piva }}</p>
        </div>
        
        <div class="card-body">
            <a href="{{route('admin.restaurant.edit', $restaurant)}}" class="card-link">Modifica</a>
        
        </div>
    </div>
    
    @endsection