@extends('layouts.admin')
@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Partita iva</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
            <tr>
                <th scope="row">{{ $restaurant->id }}</th>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->address }}</td>
                <td>{{ $restaurant->piva }}</td>
                <td>{{ $restaurant->photo }}</td>
                <td> 
                    <a href="{{ route('admin.restaurant.show', $restaurant) }}"> Dettaglio </a>
                    <a href="{{ route('admin.restaurant.edit', $restaurant) }}"> Modifica </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id }}">
                        Elimina              
                      </button>
                </td>
            </tr>
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

                    <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST" class="">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            <a href="{{ route('admin.restaurant.create') }}" role="button" class="btn btn-primary">Crea</a>
        </tbody>
    </table>
    
    {{-- Se è stata usata la paginazione --}}
    {{ $restaurants->links('pagination::bootstrap-5') }}

    <!-- Altri dati del ristorante -->

    
    @endsection
