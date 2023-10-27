@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="container">
    <h2 class="fs-4 my-4">Ristorante</h2>
    <div class="row justify-content-center align-items-center mt-3">
        <div class="col-7 p-3">
            @if (Str::contains($restaurant->photo, 'http'))
            <img id="restaurant_img" id="restaurant_img" src="{{ asset('storage/' . $restaurant->photo) }}" class="card-img-top rounded" alt="...">
        @else
            <img id="restaurant_img" id="restaurant_img" class="card-img-top rounded" src="{{$restaurant->photo }}" alt="">
        @endif
        </div>
        <div class="col-5 p-3">
            <div>
                <h2 class="fs-1 fw-bold pb-4">{{ $restaurant->name }}</h2>
            </div>
            <div>
                <div class="py-3">
                    <h4>Indirizzo</h4>
                    <p class="fst-italic">{{ $restaurant->address }}</p>
                </div>
                <div class="py-3">
                    <h4>Partita IVA</h4>
                    <p class="fst-italic">{{ $restaurant->piva }}</p>
                </div>
                <div class="py-3">
                  <!-- Mostra le tipologie associate al ristorante -->
                <p class="card-text fst-italic"><strong>Tipologie:</strong>
                @if($restaurant->typologies->count() > 0)
                    @foreach($restaurant->typologies as $typology)
                        {{ $typology->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                @else
                    Nessuna tipologia associata
                @endif
            </p>
                </div>
            </div>
            <div id="azioni"> 
                        <a class="btn btn-warning text-decoration-none actions" href="{{ route('admin.restaurants.edit', $restaurant) }}"> <i class="fa-solid fa-pen"></i> Modifica</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id }}"><i class="fa-solid fa-trash"></i> Elimina          
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $restaurant->id }}-label"
                          aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content bg-dark">
                                  <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="delete-modal-{{ $restaurant->id }}-label">Attenzione!</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Sicuro di voler eliminare definitivamente il tuo ristorante "<strong>{{ $restaurant->name }}</strong>"?<br>
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
            </div>
        </div>
    </div>
</div>
@endsection
