<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/trix-editor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toaster.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src={{ asset('img/logo.png') }} alt="{{ config('app.name', 'Laravel') }}" style="width: 250px; "/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @auth
                                <a href="{{ route('users.notifications') }}" class="btn btn-primary">
                                    <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }} Unread Notifications</span>
                                </a>
                            @endauth
                            <a href="{{ route('discussions.index') }}" class="btn btn-primary">
                                    <span class="badge badge-light">All Discussions</span>
                            </a>
                        </li>


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
        @if(!in_array(request()->path(), ['login', 'register', 'password/reset', 'password/email']))
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-lg-center mb-2">
                            @auth
                                <a href="{{ route('discussions.create') }}" class="btn btn-outline-success btn-sm" style="width: 100%">ADD DISCUSSION</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm" style="width: 100%">SIGN IN FOR ADD DISCUSSION</a>
                            @endauth
                        </div>
                        <div class="card">
                            <div class="card-header">Channel List</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($channels as $channel)
                                <li class="list-group-item"><a href="{{ route('discussions.index') }}?channel={{ $channel->slug }}">
                                        {{ $channel->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row py-4">
                    @yield('content')
                </div>
            </div>
        @endif
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/trix-editor.js') }}"></script>
<script src="{{ asset('js/toaster.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif

        @if(Session::has('danger'))
            toastr.info("{{ Session::get('danger') }}")
        @endif
    </script>
 @yield('scripts')
</html>
