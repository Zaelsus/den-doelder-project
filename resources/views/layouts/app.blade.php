<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Den Doelder</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
@extends(isset($order) ? 'modals.orders':'blank')
@extends(Auth::user()->role !=='Administrator' && isset($order)  ? 'modals.finishProduction':'blank')
@extends(Auth::user()->role !=='Administrator' && isset($order)  ? 'modals.truck':'blank')
@extends(Auth::user()->role !=='Administrator' ? 'modals.machines':'blank')
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-light colour-purple">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="secondLiHeader"><h1 class="headerCenter">@yield('header')</h1></li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <span class="d-none d-md-inline btn colour-orange">Change Production Line</span>
                </a>
                <ul class="dropdown-menu  bg-transparent text-center">
                    @if(Auth::user()->role !== 'Administrator')
                        @php $machines=\App\Models\Machine::where('id','!=',Auth::user()->machine->id)->where('name','!=','None')->get();@endphp
                        @foreach($machines as $machine)
                            <li class="align-content-center">
                                <div class="container-lg ">
                                    <div>
                                        <button type="button"
                                                class="far fas fa-arrow-alt-circle-up btn  {{$machine->id === 1 ? 'btn-success':''}}
                                                {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}}"
                                                data-toggle="modal"
                                                data-target={{"#machineChoice2" . $machine->id}}>
                                            Enter Machine {{$machine->name}}
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <a href="{{ route('machines.index') }}" class="text-center btn btn-success">
                                <span>Change View</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="/img/pallets150.jpg"
                         class="user-image img-circle elevation-2" alt="Goose">
                    <span class="d-none d-md-inline text-white">User: {{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header shade">
                        <img src="/img/pallets150.jpg"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                        <h6> {{ Auth::user()->name }}</h6>
                        <span class="badge colour-orange ">{{ Auth::user()->role }} team</span>
                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn shade ">Profile</a>
                        <a href="#" class="btn shade float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')



<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

</div>

<script src="{{ mix('js/app.js') }}" defer></script>

@yield('custom_js')

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
