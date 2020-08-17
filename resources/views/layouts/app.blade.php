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
    <script>
        window.user = {
            id: {{ \Auth::id() }},
        };
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .chat-app {
            display: flex;
        }
        .contacts-list {
            flex: 2;
            max-height: 100%;
            height: 600px;
            overflow: scroll;
            border-left: 1px solid #a6a6a6;
        }
        .contacts-list ul {
            list-style-type: none;
            padding-left: 0;
        }
        .contacts-list ul li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaa;
            height: 80px;
            position: relative;
            cursor: pointer;
        }
        .contacts-list ul li.selected {
            background: #dfdfdf;
        }
        .contacts-list ul li span.unread {
            background: #82e0a8;
            color: #fff;
            position: absolute;
            right: 11px;
            top: 20px;
            display: flex;
            font-weight: 700;
            min-width: 20px;
            justify-content: center;
            align-items: center;
            line-height: 20px;
            font-size: 12px;
            padding: 0 4px;
            border-radius: 3px;
        }

        .contacts-list ul li .contact {
            flex: 3;
            font-size: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .contacts-list ul li .contact p {
            margin: 0;
        }
        .contacts-list ul li .contact p.name {
            font-weight: bold;
        }
        .conversation {
            flex: 5;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .conversation h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }

        .composer textarea {
            width: 96%;
            margin: 10px;
            resize: none;
            border-radius: 3px;
            border: 1px solid lightgray;
            padding: 6px;
        }
        .feed {
            background: #f0f0f0;
            height: 100%;
            max-height: 470px;
            overflow: scroll;
        }
        .feed ul {
            list-style-type: none;
            padding: 5px;
        }
        .feed ul li.message {
            margin: 10px 0;
            width: 100%;
        }
        .feed ul li.message .text {
            max-width: 200px;
            border-radius: 5px;
            padding: 12px;
            display: inline-block;
        }
        .feed ul li.message.received {
            text-align: right;
        }
        .feed ul li.message.received .text {
            background: #b2b2b2;
        }
        .feed ul li.message.sent {
            text-align: left;
        }
        .feed ul li.message.sent .text {
            background: #81c4f9;
        }



    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
