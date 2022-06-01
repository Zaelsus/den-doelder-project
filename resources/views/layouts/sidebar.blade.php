<aside class="main-sidebar sidebar-dark-gray-dark colour-purple elevation-4">
    {{--    <div class="dropdown-toggle" data-toggle="dropdown">--}}

    <a href="{{ route('home') }}" class="brand-link">
        <img src="\img\pallets150.jpg"
             alt="Den Doelder Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Den Doelder</span>
    </a>
    <div class="sidebar">
        <h3><span class="badge colour-orange align-content-lg-stretch d-flex justify-content-center">{{ Auth::user()->role }} View</span>
        </h3>
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    use App\Models\Order;
                    if(Auth::user()->role === 'Production') {
                        if(Order::isInProduction() ==='In Production'){
                       $order = Order::where('status','In Production')->first();
                       }elseif(Order::isInProduction() ==='Paused') {
                           $order = Order::where('status','Paused')->first();
                       }
                        } elseif(Auth::user()->role === 'Administrator') {
                        $order = Order::isSelected();
                        }
                @endphp
                    @include('layouts.menu',['order'=> $order])

            </ul>
        </nav>
    </div>
</aside>
