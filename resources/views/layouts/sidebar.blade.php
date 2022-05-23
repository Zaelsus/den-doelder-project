<aside class="main-sidebar sidebar-dark-gray-dark bg-gray elevation-4">
    {{--    <div class="dropdown-toggle" data-toggle="dropdown">--}}
    <a href="{{ route('home') }}" class="brand-link">
        <img src="\img\pallets150.jpg"
             alt="Goose hehe"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Den Doelder</span>
    </a>

    <div class="sidebar">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               @php
                   use App\Models\Order;
                       if(Order::isInProduction() ==='In Production'){
                      $order = Order::where('status','In Production')->first();
                      }elseif(Order::isInProduction() ==='Paused') {
                          $order = Order::where('status','Paused')->first();
                      }
               @endphp
{{--                    @if(Order::isInProduction() !== 'no production')--}}
                        @include('layouts.menu',['order'=> $order])
{{--                    @else--}}
{{--                         @include('layouts.home.startmenu')--}}

{{--                @endif--}}


            </ul>
        </nav>
    </div>
</aside>
