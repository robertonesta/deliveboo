@extends('layouts.admin')
@section('content')

<div>

    <h1 class="text-center">Edit your restaurant's details.</h1>
    <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST">
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
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    </div>
@endsection