@extends('layouts.admin')
@section('content')
<div class="container py-5">
{{-- Mostro solo se esiste un ristorante --}}
@if(count($restaurants) > 0)
@foreach ($restaurants as $restaurant)
<div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3">
    <div class="col">
        <div class="card bg-transparent border-0">
        <a class="nav-link text-dark" aria-current="page" href="{{route('admin.restaurants.create')}}">
                <div id="img" class="h-75 w-75 object-fit-cover text-center mx-auto">
                    <img class="img-fluid" src="{{ asset('img/restaurant.png')}}" alt="">
                </div>
                <h3 class="text-center orange fw-bold mt-3">Dettagli Ristorante</h3>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card bg-transparent border-0">
            <a class="nav-link text-dark" aria-current="page" href="{{route('admin.dishes.index')}}">
                <div id="img" class="h-75 w-75 object-fit-cover text-center mx-auto">
                    <img class="img-fluid" src="{{ asset('img/menu.png')}}" alt="">
                </div>
                <h3 class="text-center orange fw-bold mt-3">Menù</h3>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card bg-transparent border-0">
            <a class="nav-link text-dark" aria-current="page" href="{{route('admin.orders.index')}}">
                <div id="img" class="h-75 w-75 object-fit-cover text-center mx-auto">
                    <img class="img-fluid" src="{{ asset('img/bill.png')}}" alt="">
                </div>
                <h3 class="text-center orange fw-bold mt-3">Ordini</h3>
            </a>
        </div>
    </div>
</div>
@endforeach
{{-- Mostro il pulsante per creare il ristorante --}}
@else
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="text-center my-5">
    <a href="{{ route('admin.restaurants.create') }}" role="button" class="btn btn-primary">Crea il profilo per il tuo ristorante</a>
</div>
@endif

{{-- Se è stata usata la paginazione --}}
{{ $restaurants->links('pagination::bootstrap-5') }}

<!-- Altri dati del ristorante -->
</div>


@endsection
