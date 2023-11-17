@extends('layouts.admin')

@section('content')
<div id="show_orders" class="container p-5">
    <div class="row row-cols-1 d-flex justify-content-center">
        <div class="col d-flex justify-content-around">
            <div class="card w-40">
                <div class="card-header">
                    @if($single_order)
                    @foreach($single_order as $order)
                    <h3>Ordine n. {{$order['order_id']}}</h3>
                </div>
                <div class="card-body d-flex flex-column justify-content-between align-items-start">
                    @foreach ($order['dishes'] as $dish)
                    <div class="d-flex justify-content-between w-100">
                        <div>{{$dish['dish_name']}}</div>
                        <div><strong>{{$dish['quantity']}}</strong> x €{{$dish['price']}}</div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <strong>Totale </strong>
                    <div>€{{$order['order_totalprice']}}</div>
                </div>
            </div>
            <div class="card w-40">
                <div class="card-header">
                    <h3>Dati Cliente</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="fs-6 w-50">
                            <h5><strong>Nome</strong></h5>
                            <p class="fst-italic w-100">{{$order['order_name']}}</p>
                        </div>
                        <div class="fs-6 w-50 text-end">
                            <h5><strong>Cognome</strong></h5>
                            <p class="fst-italic w-100">{{$order['order_lastname']}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="fs-6 w-50">
                            <h5><strong>Indirizzo</strong></h5>
                            <p class="fst-italic w-100">{{$order['order_address']}}</p>
                        </div>
                        <div class="fs-6 w-50 text-end">
                            <h5><strong>Telefono</strong></h5>
                            <p class="fst-italic w-100">{{$order['order_phone']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <!-- Button trigger modal -->
    <div class="p-3 text-center">
        <button type="button" class="btn btn-danger actions" data-bs-toggle="modal"
                    data-bs-target="#modal{{$order['order_id']}}">
                    <i class="fa-solid fa-trash-can"></i> Elimina
        </button>
                <!-- Modal -->
                <div class="modal fade" id="modal{{$order['order_id']}}" tabindex="-1"
                    aria-labelledby="modalTitle-{{$order['order_id']}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sicuro di voler eliminare questo ordine?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Annulla</button>
                                <form action="{{route('admin.orders.destroy', $order['order_id'])}}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancella</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Modal -->
    </div>
</div>
@endsection
