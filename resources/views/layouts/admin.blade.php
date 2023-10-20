<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Deliveboo</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&family=Manrope:wght@400;600&family=Noto+Sans:wght@400;600;700;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Outfit:wght@400;700&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-3 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0" href="#">Deliveboo</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown open">
                <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{('Home')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ ('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse px-0">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-dark {{Route::currentRouteName() == 'admin.dashboard' ? 'bg-primary' : ''}}" aria-current="page" href="{{route('admin.dashboard')}}">
                                    <i class="fa-regular fa-chart-bar"></i>
                                    {{__('Dashboard')}}
                                </a>
                                <a class="nav-link text-dark {{Route::currentRouteName() == 'admin.restaurants' ? 'bg-primary' : ''}}" aria-current="page" href="{{route('admin.restaurants.index')}}">
                                    <i class="fa-regular fa-chart-bar"></i>
                                    {{__('Restaurant')}}
                                </a>
                                <a class="nav-link text-dark {{Route::currentRouteName() == 'admin.dishes' ? 'bg-primary' : ''}}" aria-current="page" href="{{route('admin.dishes.index')}}">
                                    <i class="fa-regular fa-chart-bar"></i>
                                    {{__('Dishes')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-dark text-white">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>