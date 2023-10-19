@extends('layouts.admin')
@section('content')

<div>

    <h1 class="text-center">INSERISCI I DATI DEL TUO RISTORANTE</h1>
    <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST">
        @method('PUT') 
        @csrf
        <div class="col-md-10">
            <label for="title" class="form-label">Nome</label>
        <input 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            id="name" 
            name="name" 
            value="{{old('name', $restaurant->name)}}" 
          
        />
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    
        <div class="col-md-10">
            <label for="description" class="form-label">Indirizzo</label>
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
    
    
        <div class="col-md-10">
            <label for="piva" class="form-label">Inserisci partita iva</label>
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
        <div class="col-md-10">
            <label for="slug" class="form-label">slug</label>
        <input 
            type="text" 
            class="form-control @error('slug') is-invalid @enderror" 
            id="slug" 
            name="slug" 
            value="{{old('slug, $restaurant->slug')}}" 
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