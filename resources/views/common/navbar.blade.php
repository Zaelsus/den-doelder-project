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
                <a href="{{route('todo.index')}}"
                   class="navbar-item ">
                    Tuck View
                </a>
                <a href="{{ route('orders.index') }}"
                   class="navbar-item {{ Request::route()->getName() === 'orders.index' ? "is-active" : "" }}">
                    Orders
                </a>
                <a href="{{ route('hourlyReports.index') }}"
                   class="navbar-item {{ Request::route()->getName() === 'hourlyReports.index' ? "is-active" : "" }}">
                    Hourly Check-up
                </a>
            </div>
        </div>
    </div>
</nav>


