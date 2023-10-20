@extends('layouts.admin')
@section('content')

<div>
    <h1 class="text-center">Enter your restaurant's details.</h1>
    <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
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
{{-- aggiunta tipologia di ristorante --}}
        <div class="col-md-10 mb-3">
    <div class="col-lg-2 col-md-2 text-center text-md-end">
        <label class="form-label">Typologies</label>
    </div>
    <div class="col-lg-10 col-md-10">
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
                                class="form-check-input" <!-- Aggiunto class form-check-input -->
                                @if(in_array($typology->id, old('typologies', []))) checked @endif>
                            <label class="form-check-label" for="typology-{{ $typology->id }}">
                                {{ $typology->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        @error('typologies') <!-- Modificato 'services' a 'typologies' -->
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
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