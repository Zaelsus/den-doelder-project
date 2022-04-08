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
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a href="/"
                   class="navbar-item {{ Request::path() === '/' ? "is-active" : "" }}">
                    Home
                </a>
                <a href="{{ route('orders.index') }}"
                   class="navbar-item {{ Request::route()->getName() === 'orders.index' ? "is-active" : "" }}">
                    Orders
                </a>
            </div>
        </div>
    </div>
</nav>


