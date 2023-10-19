@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">New dish</h2>
   @include('partials.validation_error')
    <form action="{{route('admin.dishes.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Give this dish a name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="w-100 form-control" id="description" name="description" aria-describedby="description" placeholder="Describe the dish" rows="4"></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea type="text" class="w-100 form-control" id="ingredients" name="ingredients" aria-describedby="ingredients" placeholder="Name all the ingredients of this dish" rows="4"></textarea>
            @error('ingredients')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" value="{{old('price')}}" step="0.01" name="price" id="price" class="form-control" placeholder="dish price" aria-describedby="helpId">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-check">
          <input class="form-check-input" value="1" type="checkbox" id="visible" name="visible">
          <label class="form-check-label fw-bold" for="visible">
            Available
          </label>
        </div>
        <div id="buttons" class="d-flex justify-content-center gap-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
@endsection
