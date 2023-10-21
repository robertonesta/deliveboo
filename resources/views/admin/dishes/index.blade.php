@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Piatti</h2>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <a href="{{route('admin.dishes.create')}}" class="my-3 btn btn-primary text-decoration-none actions">
            <span>Aggiungi un nuovo piatto</span>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
      <thead class="text-center">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Immagine</th>
          <th scope="col" width="25%">Descrizione</th>
          <th scope="col" width="25%">Ingredienti</th>
          <th scope="col">Disponibilità</th>
          <th scope="col">Prezzo</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @forelse ($dishes as $dish)
        <tr>
          <td scope="row">{{$dish->id}}</td>
          <td scope="row">{{$dish->name}}</td>
          <td scope="row"><img class="h-100 fit-cover" width="100px" src="{{ asset('storage/' .$dish->photo)}}" alt=""></td>
          <td scope="row">{{$dish->description}}</td>
          <td scope="row">{{$dish->ingredients}}</td>
          <td scope="row">{{$dish->visible ? 'Disponibile' : 'Terminato'}}</td>
          <td scope="row">€{{$dish->price}}</td>
          <td class="d-flex align-items-center justify-content-center">
                        <a href="{{route('admin.dishes.show', $dish)}}"
                            class="btn btn-primary text-decoration-none actions">
                            <span><i class="fa-solid fa-eye"></i></span>
                        </a>
                        <a href="{{route('admin.dishes.edit', $dish)}}"
                            class="mx-1 btn btn-warning text-decoration-none actions">
                            <span><i class="fa-solid fa-pencil"></i></span>
                        </a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger actions" data-bs-toggle="modal"
                            data-bs-target="#modal{{$dish->slug}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$dish->slug}}" tabindex="-1"
                            aria-labelledby="modalTitle-{{$dish->slug}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sicuro di voler eliminare
                                        <strong>{{$dish->name}}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{route('admin.dishes.destroy', $dish->slug)}}" method="post"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Cancella</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal -->
                    </td>
        </tr>
        @empty
        <tr>No dishes registered.</tr>
        @endforelse
      </tbody>
        </table>
    </div>
</div>
@endsection
