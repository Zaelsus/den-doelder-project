<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
{{--//removes link to test--}}
    @yield ('link')
</head>

<body>
    {{--navbar for todo view--}}
    <nav class="navbar is-primary  has-text-white" >
        <div class="container">
            <div class="navbar-brand">
                <a href="/" class="navbar-item">
                    <strong><i class="fas fa-tree"></i> Den Doelder</strong>

                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-item" id="navMenu">
                <div class="navbar-start">
                    <a href="/truck/todo#"
                       class="navbar-item ">
                        TODO
                    </a>
                    <a href="/truck/completed#"
                       class="navbar-item ">
                        COMPLETED
                    </a>
                    <a href="/truck/onhold#"
                       class="navbar-item ">
                        ON HOLD
                    </a>
{{--                    <a href="#"--}}
{{--                       class="navbar-item ">--}}
{{--                        NOTES--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </nav>




@yield('body')

</body>
</html>

