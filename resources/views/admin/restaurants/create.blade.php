@extends('layouts.admin')
@section('content')

<div>
    <h1 class="text-center">Enter your restaurant's details.</h1>
    <form action="{{ route('admin.restaurant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-md-10 mb-3">
            <label for="name" class="form-label">Name</label>
        <input 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            id="name" 
            name="name" 
            value="{{old('name')}}" 
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
            value="{{old('address')}}" 
        />
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    
    
        <div class="col-md-10 mb-3">
            <label for="piva" class="form-label">Enter VAT Number</label>
        <input 
            type="text" 
            class="form-control @error('piva') is-invalid @enderror" 
            id="piva" 
            name="piva" 
            value="{{old('piva')}}" 
        />
        @error('piva')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="row  mb-3">
            <div class="col-md-10 ">
              <label for="photo" class="form-label">Picture</label>
            </div>
            <div class="col-md-10">
              <input type="file" 
                name="photo" 
                id="photo" 
                class="form-control @error('photo') is-invalid @enderror" />
              @error('photo')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
        </div>

    
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
    </div>

@endsection