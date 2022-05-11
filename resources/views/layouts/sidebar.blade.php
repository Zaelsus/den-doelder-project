<aside class="main-sidebar sidebar-dark-gray-dark bg-orange elevation-4">
{{--    <div class="dropdown-toggle" data-toggle="dropdown">--}}
        <a href="{{ route('home') }}" class="brand-link">
            <img src="\img\tinygans.png"
                 alt="Goose hehe"
                 class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">Den Doelder</span>
        </a>

    <div class="sidebar">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
