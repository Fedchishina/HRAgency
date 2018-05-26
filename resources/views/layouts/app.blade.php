<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel Application">
    <meta name="author" content="Sviatoslav Voitenko">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <title>HR Agency</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jstree/style.min.css') }}" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jstree.min.js') }}"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
</head>

<body>
@section('navbar')
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark m-sm-auto">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">HR Agency</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item mr-1 active"><a class="nav-link btn btn-danger my-2 my-sm-0"
                                                        href="{{ route('home') }}">Home</a></li>

                    <li class="nav-item dropdown mr-1 ">
                        <a class="nav-link dropdown-toggle btn btn-primary my-2 my-sm-0 text-light" href="#"
                           id="dropdown01" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Services</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{ route('consulting') }}">HR-Consulting</a>
                            <a class="dropdown-item" href="{{ route('recruitment') }}">Recruitment</a>
                            <a class="dropdown-item" href="{{ route('staffing') }}">Interim Staffing</a>
                        </div>
                    </li>

                    <li class="nav-item mr-1"><a class="nav-link btn btn-warning my-2 my-sm-0 text-dark"
                                                 href="{{ route('workers-show') }}">Workers</a></li>

                    <li class="nav-item mr-1"><a class="nav-link btn btn-success my-2 my-sm-0 text-light"
                                                 href="{{ route('contacts') }}">Contacts</a></li>

                    <li class="nav-item dropdown mr-1 ">
                        <a class="nav-link dropdown-toggle  btn btn-outline-secondary my-2 my-sm-0" href="#"
                           id="dropdown01" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown">
                            <a class="dropdown-item" href="{{ route('comments') }}">Comments</a>
                            <a class="dropdown-item" href="{{ route('profile') }}">Developer profile</a>
                            <a class="dropdown-item" href="{{ route('about') }}">About</a>
                        </div>
                    </li>
                </ul>

                @guest
                    <ul class="navbar-nav nav justify-content-end">
                        <li class="nav-item mr-1"><a class="nav-link btn btn-light my-2 my-sm-0 text-dark"
                                                     href="#" data-toggle="modal" data-target="#myModal">Sign in</a></li>
                    </ul>
                @else
                    <ul class="navbar-nav nav justify-content-end">
                        <li class="nav-item dropdown mr-1">
                            <a class="nav-link dropdown-toggle btn btn-outline-secondary text-light my-2 my-sm-0"
                               href="#"
                               id="loginDropdown" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">User: {{ Auth::user()->name }}</a>

                            <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                <a class="dropdown-item" href="{{ route('panel') }}">Control panel</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </div>
        </div>
    </nav>
@show

@include('auth.login')
@yield('auth')

@include('notify')
@yield('myModalNotify')

<main role="main" class="pt-5">
    <br/>
    <div class="container">
        @if(isset($statusMessage))
            {!! $statusMessage !!}
        @endif
    </div>

    @if(count($errors) > 0)
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show"><strong>Errors:</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    @endif

    @yield('content')

    @section('content-footer')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>HR Consulting</h2>
                    <img src="{{asset('img/img0-0.jpg')}}" class="rounded" alt="Consulting">
                    <p>Our team of consultants have an average
                        of 20 years of experience working in
                        the public and not for profit sectors.</p>
                    <p><a class="btn btn-secondary" href="{{ route('consulting') }}" role="button">View details
                            &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Recruitment</h2>
                    <img src="{{asset('img/img0-1.jpg')}}" class="rounded" alt="Recruitment">
                    <p>Our range of recruitment services includes
                        RPO and large scale recruitment support.</p>
                    <p><a class="btn btn-secondary" href="{{ route('recruitment') }}" role="button">View
                            details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>Interim Staffing</h2>
                    <img src="{{asset('img/img0-2.jpg')}}" class="rounded" alt="Interim Staffing">
                    <p>We are a recognized leader in the provision of temporary
                        administrative and interim professional resources for
                        the public and not-for-profit sectors.</p>
                    <p><a class="btn btn-secondary" href="{{ route('staffing') }}" role="button">View details
                            &raquo;</a></p>
                </div>
            </div>
            <hr>
        </div>
    @show
</main>

@section('footer')
    <footer class="container">
        <p>&copy; Sviatoslav Voitenko 2018</p>
    </footer>
@show

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-treeview.min.js') }}"></script>

</body>
</html>