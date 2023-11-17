@extends('layouts.admin')

@section('content')
<div class="container">
  <h2 class="fs-4 my-4">Ordini</h2>
  @if (session('message'))
  <div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
  </div>
  @endif
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
    <div class="col">
      @if($merged)
      @foreach ($merged as $merge)
      @if($merge['order_status'] === 1)
        <div class="card">
          <div class="card-header"> Ordine n.{{$merge['order_id']}}</div>
          <div class="card-body d-flex flex-column justify-content-between align-items-start">
            @foreach ($merge['dishes'] as $dish)
            <div class="d-flex justify-content-between w-100">
              <div>{{$dish['dish_name']}}</div>
              <div><strong>{{$dish['quantity']}}</strong> x €{{$dish['price']}}</div>
            </div>
            @endforeach
          </div>
          <div class="card-footer d-flex justify-content-between align-items-center">
            <strong>Totale </strong>
            <div>€{{$merge['order_totalprice']}}</div>
          </div>
        </div>
      @endif
      @endforeach
      @else
      <tr>Nessun ordine ricevuto.</tr>
      </tbody>
      </table>
    </div>
    @endif
  </div>
</div>

</div>
@endsection