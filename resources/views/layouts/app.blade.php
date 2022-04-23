<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href=""//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel='stylesheet' href="{{ asset('css/reset.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar-expand-md navbar-light bg-white menu-up shadow">
            <div class="container">
                
                    <a class="navbar-brand" href="{{ url('/Loglist') }}">
                        <img src="{{ asset('img/horizontal_on_white_by_logaster.png') }}" alt="logo" style="width:150px;">
                    </a>
                    
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/Logslist') }}">投稿一覧</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5" style = "background-color:">
            
            
            @yield('content')
            
        </main>
        <footer>
            <ul class = "p-3 row bg-info menu-bottom shadow-bottom">
                   <li class="col-3 text-center"><a href="{{ url('/Logslist1') }}" class = "text-danger"> <img src="{{ asset('img/icons8-犬の心-30.png') }}" alt="logo" style="width:35px;"></a></li>
                   <li class="col-3 text-center"><a href="{{ url('/Logslist2') }}" class = "text-success"> <img src="{{ asset('img/icons8-ドッグコーン-30.png') }}" alt="logo" style="width:35px;"></a></li>
                   <li class="col-3 text-center"><a href="{{ url('/') }}" class = "text-primary"> <img src="{{ asset('img/icons8-peace-pigeon-50.png') }}" alt="logo" style="width:35px;"></a></li>
                   
                   <li class="col-3 text-center"><a href="{{ url('/home') }}" class = "text-dark"> <img src="{{ asset('img/icons8-犬の家-64.png') }}" alt="logo" style="width:35px;"></a></li>
                   
            </ul>
        </footer>

       
    </div>
</body>
</html>
