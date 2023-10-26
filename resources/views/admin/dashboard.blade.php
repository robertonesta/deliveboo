@extends('layouts.admin')
@section('content')
{{-- Mostro solo se esiste un ristorante --}}
@if(count($restaurants) > 0)
<table class="table table-striped table-dark">
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
            <td scope="row"><img class="h-100 fit-cover" width="100px" src="{{ asset('storage/' .$restaurant->photo)}}" alt=""></td>
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


@endsection