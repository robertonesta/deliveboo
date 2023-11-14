@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 my-4">Ordini</h2>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    @if($orders->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
        <thead class="text-center">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Costo Totale</th>
          <th scope="col"></th>
        </tr>
      </thead>
    <tbody class="text-center">
    @foreach ($orders as $order)
    <tr class="align-middle">
          <td  scope="row">{{$order->id}}</td>
          <td scope="row">€{{$order->totalprice}}</td>
          <td class="d-flex align-items-center justify-content-center">
            <a href="{{route('admin.orders.show', $order)}}"
                class="btn bg-orange text-decoration-none actions">
                <span><i class="fa-solid fa-eye"></i> Visualizza</span>
            </a>
          </td>
        </tr>
    @endforeach
    @else
    <tr>Nessun ordine ricevuto.</tr>
    </tbody>
        </table>
    </div>
@endif
</div>
@endsection
