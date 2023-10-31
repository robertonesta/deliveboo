@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="container">
    <div class="row d-flex justify-content-center my-5">
        <div class="col-7">
            @if (Str::contains($restaurant->photo, 'http'))
            <img id="restaurant_img" class="rounded w-100 h-100" src="{{$restaurant->photo }}" alt="">
            @else
            <img id="restaurant_img" src="{{ asset('storage/' . $restaurant->photo) }}" class="rounded w-100 h-100" alt="...">
        @endif
        </div>
        <div class="col-5 d-flex flex-column justify-content-around">
            <div>
                <h2 class="fs-1 fw-bold">{{ $restaurant->name }}</h2>
            </div>
                <div>
                    <h4><strong>Indirizzo</strong></h4>
                    <p class="fst-italic">{{ $restaurant->address }}</p>
                </div>
                <div>
                    <h4><strong>Partita IVA</strong></h4>
                    <p class="fst-italic">{{ $restaurant->piva }}</p>
                </div>
                <div>
                  <!-- Mostra le tipologie associate al ristorante -->
                <h4><strong>Tipologie</strong></h4>
                <p class="fst-italic">
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
    </div>
    <div id="azioni" class="text-center"> 
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
@endsection
