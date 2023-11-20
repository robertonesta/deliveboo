@extends('layouts.admin')

@section('content')
<div class="container" id="index_orders">
  <h2 class="fs-4 my-4">Ordini ricevuti</h2>
  @if (session('message'))
  <div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
  </div>
  @endif
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
    @if($merged)
    @foreach ($merged as $merge)
    @if($merge['order_status'] === 1)
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>
            Ordine n.{{$merge['order_id']}}
          </span>
          <a class="action_btn action_show p-2" href="{{ route('admin.orders.show', $merge['order_id']) }}" title="Show order">
            <i class="fa-solid fa-eye"></i>
          </a>
        </div>
        <div class="card-body p-0 d-flex flex-column justify-content-start align-items-start">
          <div class="layer p-3">
            @foreach ($merge['dishes'] as $dish)
            <div class="d-flex justify-content-between w-100">
              <div>{{$dish['dish_name']}}</div>
              <span><strong>{{$dish['quantity']}}</strong> x €{{$dish['price']}}</span>
            </div>
            @endforeach
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <strong>Totale </strong>
          <span>€{{$merge['order_totalprice']}}</span>
        </div>
      </div>
    </div>
    @endif
    @endforeach
    @else
    <p>Nessun ordine ricevuto.</p>
    @endif
  </div>
</div>

</div>
@endsection