@extends('layouts.admin')

@section('content')
<div class="container">
<h2 class="fs-4 text-secondary my-4">Modifica il piatto</h2>
    @include('partials.validation_error')
    <form class=" card p-4" action="{{route('admin.dishes.update', $dish->slug)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Modifica il nome del piatto" value="{{old('name', $dish->name)}}" aria-describedby="helpId">
        </div>

        <div class="row mb-3 align-items-center">
          <div class="col-md-12">
              <label for="photo" class="form-label">Foto</label>
          </div>
          <div class="col-md-7">
              <input type="file" name="photo" id="photo" value="{{ old('photo', $dish->photo) }}" class="form-control @error('photo') is-invalid @enderror" />
              @error('photo')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="col-md-5 ">
              @if (Str::contains($dish->photo, 'photo'))
                  <img src="{{ asset('storage/' . $dish->photo) }}" class="card-img-top " alt="...">
              @else
                  <img class="card-img-top rounded  mb-3" src="{{ asset('storage/' . $dish->photo) }}" alt="">
              @endif
          </div>
      </div>



        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea type="text" name="description" id="description" class="w-100 form-control" rows="5" value="{{old('description', $dish->description)}}"  placeholder="Modifica la descrizione del piatto">{{old('description', $dish->description)}}</textarea>
        </div>
        <div class="mb-3">
          <label for="ingredients" class="form-label">Ingredienti</label>
          <textarea type="text" name="ingredients" id="ingredients" class="w-100 form-control" rows="5" value="{{old('ingredients', $dish->ingredients)}}"  placeholder="Modifica gli ingredienti del piatto">{{old('ingredients', $dish->ingredients)}}</textarea>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Prezzo</label>
          <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{old('price', $dish->price)}}" placeholder="Cambia il prezzo" aria-describedby="helpId">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="visible" name="visible" value="{{old('visible', $dish->visible)}}" {{ $dish->visible ? 'checked' : '' }}>
          <label class="form-check-label" for="visible">
              Disponibile
          </label>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Conferma</button>
        </div>
    </form>
</div>

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