<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.ico') }}" />
    <title>Deliveboo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&family=Manrope:wght@400;600&family=Noto+Sans:wght@400;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Outfit:wght@400;700&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <!-- Braintree -->
    <!--   @vite(['resources/js/braintree.js']) -->
    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg_dark shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                    <a href="http://localhost:5174/">
                        <div class="logo_laravel w-25">
                            <img src="{{asset('/img/deliveboo-logo.png')}}" alt="" class="img-fluid">
                            <img src="{{asset('/img/moto.png')}}" alt="" class="moto">
                        </div>
                    </a>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link fs-3 fw-semibold" href="http://localhost:5174/restaurants">Ristoranti</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col px-5">
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
                     <!--    <div class="container d-flex flex-column justify-content-center w-25"> -->
                            <form method="post" id="payment-form" action="{{url('/checkout')}}" class="mt-5 bg_darker p-5 rounded-2 w-75 mx-auto">
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
                      <!--   </div> -->
                    </div>
                </div>
            </div>
        </main>
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
</body>

</html>