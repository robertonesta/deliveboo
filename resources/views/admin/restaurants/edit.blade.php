@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Modifica il tuo Ristorante</h2>
    @include('partials.validation_error')
    <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data" class="mb-3">
        @method('PUT') 
        @csrf
        <div class="col-md-12 mb-3">
            <label for="name" class="form-label">Nome</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name', $restaurant->name) }}" 
            />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input 
                type="text" 
                class="form-control @error('address') is-invalid @enderror" 
                id="address" 
                name="address" 
                value="{{ old('address', $restaurant->address) }}" 
            />
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 mb-3" >
            <label for="piva" class="form-label">Partita iva</label>
            <input 
                type="text" 
                class="form-control @error('piva') is-invalid @enderror" 
                id="piva" 
                name="piva" 
                value="{{ old('piva', $restaurant->piva) }}" 
            />
            @error('piva')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <div class="col-md-2">
                <label class="form-label">Tipologia</label>
            </div>
            <div class="col-md-12 ms-4">
                <div class="row">
                    @php
                        $typologiesChunks = $typologies->chunk(ceil($typologies->count() / 4));
                    @endphp
                    @foreach ($typologiesChunks as $chunk)
                        <div class="col-md-4 col-lg-3 col-sm-6">
                            @foreach ($chunk as $typology)
                                <div class="form-check ps-0">
                                    <input type="checkbox"
                                        id="typology-{{ $typology->id }}"
                                        value="{{ $typology->id }}"
                                        name="typologies[]"
                                        class="form-check-input"
                                        @if(in_array($typology->id, old('typologies', $restaurant->typologies->pluck('id')->toArray())))
                                            checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="typology-{{ $typology->id }}">
                                        {{ $typology->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                @error('typologies') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3 align-items-center">
            <div class="col-md-12">
                <label for="photo" class="form-label">Foto</label>
            </div>
            <div class="col-md-7">
                <input type="file" name="photo" id="photo" value="{{ old('photo', $restaurant->photo) }}" class="form-control @error('photo') is-invalid @enderror" />
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-5 ">
                @if (Str::contains($restaurant->photo, 'photo'))
                    <img src="{{ asset('storage/' . $restaurant->photo) }}" class="card-img-top " alt="...">
                @else
                    <img class="card-img-top rounded  mb-3" src="{{ $restaurant->photo }}" alt="">
                @endif
            </div>
        </div>
        
    
        <div id="buttons" class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-success">Salva</button>
        </div>
    </form>
</div>


{{-- per avere un aggiornamento in tempo reale della foto --}}
<script>
    const photoInput = document.getElementById('photo');
    const imagePreview = document.querySelector('.card-img-top');

    photoInput.addEventListener('change', function() {
        const file = photoInput.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection



