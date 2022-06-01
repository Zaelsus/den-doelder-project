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

<div class="card">
    <body>
    <!-- Main Header -->
    <div class="card-header navbar navbar-expand navbar-light colour-purple">
        <!-- Left navbar links -->
        @yield('header')
        <ul class="navbar-nav ml-auto">
            <div class="container">
                <div>
                    <img src="/img/user.png"
                         class=" img-lg img-circle elevation-2" alt="Goose">
                </div>
                <div>
                    <a href="#" class="btn shade"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </ul>
    </div>

    <!-- Left side column. contains the logo and sidebar -->
    {{--@include('layouts.sidebar')--}}

    <!-- Content Wrapper. Contains page content -->

    <section class="content text-center">
        <div class="card-body">
            @yield('content')
        </div>
    </section>


    <script src="{{ mix('js/app.js') }}" defer></script>

    @yield('third_party_scripts')

    @stack('page_scripts')
    </body>
</div>

</html>
