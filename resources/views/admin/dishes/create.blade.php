@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Nuovo Piatto</h2>
   @include('partials.validation_error')
    <form action="{{route('admin.dishes.store')}}" autocomplete="off" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 name" >
            <label for="name" class="form-label">Nome</label>
            <input type="text" 
                class="form-control" 
                id="name" 
                name="name"  
                aria-describedby="name" 
                placeholder="Inserisci un nome per il piatto"
                value="{{ old('name') }}"> 
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 row align-items-center">
            <div class="col-12" id="image">
                <label for="photo" class="col-sm-2 col-form-label">Immagine</label>
                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" />
                @error('photo')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-5" id="image-preview-container"></div>
        </div>
            

        
        <div class="mb-3 description">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Descrivi il piatto" rows="4"
            >{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3 ingredients">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <textarea type="text" class="form-control" id="ingredients" name="ingredients" aria-describedby="ingredients" placeholder="Nomina gli ingredienti del piatto" rows="4">{{ old('ingredients') }}</textarea>
            @error('ingredients')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 price">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" value="{{old('price')}}" step="0.01" name="price" id="price" class="form-control" placeholder="Inserisci il prezzo del piatto" aria-describedby="helpId">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-check">
          <input class="form-check-input" value="1" type="checkbox" id="visible" name="visible">
          <label class="form-check-label fw-bold" for="visible">
            Disponibile
          </label>
        </div>
        <div id="buttons" class="d-flex justify-content-center gap-3 my-5">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Conferma</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photo');
        const previewContainer = document.getElementById('image-preview-container');
        const resize = document.getElementById('image');

        photoInput.addEventListener('change', function() {
            const file = photoInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.createElement('img');
                imagePreview.src = e.target.result;
                imagePreview.className = 'img-fluid'; 
                resize.className = 'col-md-7';
                previewContainer.innerHTML = ''; 
                previewContainer.appendChild(imagePreview);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection



