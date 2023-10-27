@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 my-4">Menù</h2>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <a href="{{route('admin.dishes.create')}}" class="my-3 btn bg-orange text-decoration-none actions">
            <span>Aggiungi un nuovo piatto</span>
        </a>
    </div>
    @if($dishes->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Immagine</th>
          <th scope="col" width="25%">Descrizione</th>
          <th scope="col" width="25%">Ingredienti</th>
          <th scope="col">Disponibilità</th>
          <th scope="col">Prezzo</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody class="text-center">
        @forelse ($dishes as $dish)
        <tr class="align-middle">
          <td  scope="row">{{$dish->id}}</td>
          <td scope="row">{{$dish->name}}</td>
          <td scope="row">   @if (Str::contains($dish->photo, 'http'))
            <img class="w-100 object-fit-cover max-h80 rounded" src="{{$dish->photo}}" alt="">
        @else
            <img class="w-100 object-fit-cover max-h80 rounded" src="{{ asset('storage/' .$dish->photo)}}" alt="...">
        @endif</td>
          <td scope="row">{{ Str::limit($dish->description, 50) }}</td>
          <td scope="row">{{ Str::limit($dish->ingredients, 50) }}</td>
          <td scope="row">{{$dish->visible ? 'Disponibile' : 'Terminato'}}</td>
          <td scope="row">€{{$dish->price}}</td>
          <td class="d-flex align-items-center justify-content-center">
                        <a href="{{route('admin.dishes.show', $dish)}}"
                            class="btn bg-orange text-decoration-none actions">
                            <span><i class="fa-solid fa-eye"></i> Visualizza</span>
                        </a>
          </td>
        </tr>

        @empty
        <tr>Nessun piatto registrato!</tr>
        @endforelse
      </tbody>
        </table>

    </div>

@endif
</div>
@endsection
