@extends('layouts.app')

@section('content')
<?php $total = request()->route('total'); ?>
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
    <form method="post" id="payment-form" action="{{url('/checkout')}}" class="mt-5 bg_darker p-5 rounded-2">
        @csrf

        <section class="d-flex gap-3 py-3 justify-content-between">
            <label for="amount">
                <span class="input-label fs-2 text-light fw-bold">Totale:</span>
            </label>
            <div class="input-wrapper amount-wrapper">
                <input type="hidden" id="amount" name="amount" min="1" placeholder="Inserisci una quota da pagare" value="{{$total}}">
                <strong id="amount" name="amount" class="fs-2 text-light">€ {{$total}}</strong>
            </div>
        </section>

        <div class="bt-drop-in-wrapper">
            <div id="dropin-container" class="text-white"></div>
        </div>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <div class="d-flex justify-content-end">
            <button id="submit-button" class="btn  btn-success fw-bold" type="submit">Paga</button>
        </div>
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
    }, function(createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            instance.requestPaymentMethod(function(requestPaymentMethodErr, payload) {
                if (requestPaymentMethodErr) {
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