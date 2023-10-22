@extends('layouts.admin')
@section('content')
{{-- Mostro solo se esiste un ristorante --}}
@if(count($restaurants) > 0)
    <table class="table table-striped table-dark">
        <thead class="text-center">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Partita iva</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
            <tr class="text-center align-middle">
                <td  scope="row">{{ $restaurant->name }}</td>
                <td  scope="row">{{ $restaurant->address }}</td>
                <td  scope="row">{{ $restaurant->piva }}</td>
                <td class="d-flex justify-content-center align-items-center"> 
                    <a class="btn btn-primary text-decoration-none actions mx-1" href="{{ route('admin.restaurants.show', $restaurant) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning text-decoration-none actions mx-1" href="{{ route('admin.restaurants.edit', $restaurant) }}"><i class="fa-solid fa-pencil"></i></a>
                    <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id }}">
                        Delete           
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $restaurant->id }}-label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-dark" id="delete-modal-{{ $restaurant->id }}-label">Conferma eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start text-dark">
                    Sei sicuro di voler eliminare il ristorante {{ $restaurant->name }} con ID
                    {{ $restaurant->id }}? <br>
                    L'operazione non è reversibile
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        
                        <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            
            </td>
            </tr>
        </tbody>
    </table>
    {{-- Mostro il pulsante per creare il ristorante --}}
    @else 
    <div class=" m-5 alert alert-info" role="alert">
       Aggiungi il tuo ristorante
    </div>
    <div class="text-center">
        <a href="{{ route('admin.restaurants.create') }}" role="button" class="btn btn-primary">Vai alla creazione del tuo Ristorante</a>
    </div>
    @endif
    
    {{-- Se è stata usata la paginazione --}}
    {{ $restaurants->links('pagination::bootstrap-5') }}

    <!-- Altri dati del ristorante -->

    
    @endsection
