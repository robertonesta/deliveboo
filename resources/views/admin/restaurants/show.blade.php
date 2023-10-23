@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif

<div class="row justify-content-center align-items-center">
    <div class="col-8  p-3">
        @if (Str::contains($restaurant->photo, 'upload'))
        <img src="{{ asset('storage/' . $restaurant->photo) }}" class="card-img-top rounded w-100" alt="...">
    @else
        <img class="card-img-top rounded w-100" src="{{$restaurant->photo }}" alt="">
    @endif
    </div>
    <div class="col-4 p-3">
        <div>
            <h2 class="fs-1 ">{{ $restaurant->name }}</h2>
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
    </div>
</div>





@endsection
