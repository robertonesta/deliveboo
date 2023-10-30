@extends('layouts.admin')
@section('content')
<div class="container">
<h2 class="fs-4 my-4">Dashboard</h2>
{{-- Mostro solo se esiste un ristorante --}}
@if(count($restaurants) > 0)
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Immagine</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Partita iva</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
        <tr class="text-center align-middle">
            <td scope="row">{{ $restaurant->name }}</td>
            <td scope="row">   
                @if (Str::contains($restaurant->photo, 'http'))
                    <img class="rounded object-fit-cover" width="100px" height="80px" src="{{$restaurant->photo}}" alt="">
                @else
                    <img class="rounded object-fit-cover" width="100px" height="80px" src="{{ asset('storage/' .$restaurant->photo)}}" alt="...">
                @endif
            </td>
            <td scope="row">{{ $restaurant->address }}</td>
            <td scope="row">{{ $restaurant->piva }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Mostro il pulsante per creare il ristorante --}}
@else
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="text-center my-5">
    <a href="{{ route('admin.restaurants.create') }}" role="button" class="btn btn-primary">Crea il profilo per il tuo ristorante</a>
</div>
@endif

{{-- Se è stata usata la paginazione --}}
{{ $restaurants->links('pagination::bootstrap-5') }}

<!-- Altri dati del ristorante -->
</div>


@endsection