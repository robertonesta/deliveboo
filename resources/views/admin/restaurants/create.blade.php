@extends('layouts.admin')
@section('content')

<div>
    <h2 class="text-center fs-1">Inserisci i dettagli del tuo Ristorante</h2>
    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf

        <div class="col-md-12 mb-3">
            <label for="name" class="form-label">Nome</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                placeholder="Inserisci il nome del tuo Ristorante" 
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
                value="{{ old('address') }}" 
                placeholder="Inserisci l'indirizzo"
            />
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <label for="piva" class="form-label">Partita iva</label>
            <input 
                type="text" 
                class="form-control @error('piva') is-invalid @enderror" 
                id="piva" 
                name="piva" 
                value="{{ old('piva') }}" 
                placeholder="Inserisci la partita iva"
            />
            @error('piva')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Aggiunta tipologia di ristorante --}}
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
                                        @if(in_array($typology->id, old('typologies', []))) checked @endif
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


        {{-- <div class="row mb-3">
            <div class="col-md-10" id="image-preview-container">
            </div>
        </div> --}}

        <div class="row mb-3">
            <div id="image" class="col-md-12">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" 
                       name="photo" 
                       id="photo" 
                       class="form-control @error('photo') is-invalid @enderror" 
                />
                @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-5 rounded" id="image-preview-container">
                
            </div>
        </div>
        
        
        <div id="buttons" class="d-flex justify-content-center gap-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Conferma</button>
        </div>
    </form>
</div>


<script>
    const photoInput = document.getElementById('photo');
    photoInput.addEventListener('change', function() {
        const file = photoInput.files[0];
        const reader = new FileReader();
        const previewContainer = document.getElementById('image-preview-container');
        const resize = document.getElementById('image');

        reader.onload = function(e) {
            const imagePreview = document.createElement('img');
            imagePreview.src = e.target.result;
            imagePreview.className = 'card-img-top mb-3';
            resize.className = 'col-md-7';
            previewContainer.innerHTML = ''; // Pulisce il contenuto precedente se presente
            previewContainer.appendChild(imagePreview);
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
