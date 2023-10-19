@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-4">
            <h2 class="fs-1 fw-bold text-white pb-4">{{$dish->name}}</h2>
        </div>
        <div class="col-8">
            <div class="fs-6 py-3">{{$dish->description}}</div>
            <div class="fs-6 py-3">{{$dish->ingredients}}</div>
            <div class="fs-5 py-1 fw-bold">€{{$dish->price}}</div>
        </div>
    </div>
</div>
@endsection