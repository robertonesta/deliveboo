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
                                class="form-check-input"
                                @if(in_array($typology->id, old('typologies', $restaurant->typologies->pluck('id')->toArray())))
                                    checked
                                @endif>
                            <label class="form-check-label" for="typology-{{ $typology->id }}">
                                {{ $typology->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
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