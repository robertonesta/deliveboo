@extends('layouts.admin')


@section('content')
<div class="container">
<h2 class="fs-4 text-secondary my-4">Edit restaurant</h2>
    @include('partials.validation_error')
    <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
        @method('PUT') 
        @csrf
        <div class="col-md-10 mb-3">
            <label for="name" class="form-label">Name</label>
        <input 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            id="name" 
            name="name" 
            value="{{old('name', $restaurant->name)}}" 
          
        />
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    
        <div class="col-md-10 mb-3">
            <label for="address" class="form-label">Address</label>
        <input 
            type="text" 
            class="form-control @error('address') is-invalid @enderror" 
            id="address" 
            name="address" 
            value="{{old('address', $restaurant->address)}}" 
        />
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    
    
        <div class="col-md-10 mb-3" >
            <label for="piva" class="form-label">Enter VAT Number</label>
        <input 
            type="text" 
            class="form-control @error('piva') is-invalid @enderror" 
            id="piva" 
            name="piva" 
            value="{{old('piva', $restaurant->piva)}}" 
        />
        @error('piva')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-md-10 ">
          <label for="photo" class="form-label">Picture</label>
        </div>
        <div class="col-md-10">
        @if (Str::contains($restaurant->photo, 'photo'))
                    <img src=" {{ asset('storage/' .$restaurant->photo)}}" class="card-img-top w-25" alt="...">
                    @else
                    <img class="card-img-top rounded w-25" src="{{ asset('storage/' .$restaurant->photo)}}" alt="">
                    @endif
          <input required type="file" name="photo" id="photo" value="{{old('photo', $restaurant->photo)}}" class="form-control @error('photo') is-invalid @enderror" />
          @error('photo')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    </div>
@endsection