@extends('layouts.app')

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<div class="container d-flex flex-column justify-content-center w-25">
    <form method="post" id="payment-form" action="{{url('/checkout')}}">
        @csrf

        <section>
            <label for="totalprice">
                <span class="input-label">Quota</span>
            </label>
            <div class="input-wrapper totalprice-wrapper">
                <input type="tel" id="totalprice" name="totalprice" min="1" placeholder="Inserisci una quota da pagare" value="10">
            </div>
        </section>

        <div class="bt-drop-in-wrapper">
            <div id="dropin-container"></div>
        </div>
        
        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button id="submit-button">Paga</button>
    </form>
</div>


  <script>
    const form = document.querySelector('#payment-form')
    const button = document.querySelector('#submit-button');
    const client_token = "{{ $token }}";

    braintree.dropin.create({
        authorization: client_token,
        container: '#dropin-container',
        vaultManager: true,
        paypal: {
        flow: 'vault',
        }
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
          if(requestPaymentMethodErr) {
            console.log('Request Payment Method Error', requestPaymentMethodErr);
            return;
          }

          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  </script>
@endsection
