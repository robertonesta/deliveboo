@extends('layouts.admin')

@section('content')
<div class="container">
<h2 class="fs-4 text-secondary my-4">Edit dish</h2>
    @include('partials.validation_error')
    <form class="bg-white card p-4" action="{{route('admin.dishes.update', $dish->slug)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="change name" value="{{old('name', $dish->name)}}" aria-describedby="helpId">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea type="text" name="description" id="description" class="w-100 form-control" rows="5" value="{{old('description', $dish->description)}}"  placeholder="edit the dish description">{{old('description', $dish->description)}}</textarea>
        </div>
        <div class="mb-3">
          <label for="ingredients" class="form-label">Ingredients</label>
          <textarea type="text" name="ingredients" id="ingredients" class="w-100 form-control" rows="5" value="{{old('ingredients', $dish->ingredients)}}"  placeholder="edit the dish ingredients">{{old('ingredients', $dish->ingredients)}}</textarea>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{old('price', $dish->price)}}" placeholder="change price" aria-describedby="helpId">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="visible" name="visible" value="{{old('visible', $dish->visible)}}" {{ $dish->visible ? 'checked' : '' }}>
          <label class="form-check-label" for="visible">
              Available
          </label>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-3">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-success">Confirm</button>
        </div>
    </form>
</div>
@endsection