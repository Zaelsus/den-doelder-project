<aside class="main-sidebar sidebar-dark-gray-dark bg-orange elevation-4">
{{--    <div class="dropdown-toggle" data-toggle="dropdown">--}}
        <a href="{{ route('home') }}" class="brand-link">
            <img src="\img\tinygans.png"
                 alt="Goose hehe"
                 class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">Den Doelder</span>
        </a>
{{--    </div>--}}

{{--    <ul class="navbar-nav ml-auto">--}}
{{--        <li class="nav-item dropdown user-menu">--}}
{{--            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">--}}
{{--                <img src="img/tinygans.png"--}}
{{--                     class="user-image img-circle elevation-2" alt="Goose">--}}
{{--                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                <!-- User image -->--}}
{{--                <li class="user-header bg-gray-dark">--}}
{{--                    <img src="img/tinygans.png"--}}
{{--                         class="img-circle elevation-2"--}}
{{--                         alt="User Image">--}}
{{--                    <p>--}}
{{--                        {{ Auth::user()->name }}--}}
{{--                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <!-- Menu Footer-->--}}
{{--                <li class="user-footer">--}}
{{--                    <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
{{--                    <a href="#" class="btn btn-default btn-flat float-right"--}}
{{--                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                        Sign out--}}
{{--                    </a>--}}
{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <div class="sidebar">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
