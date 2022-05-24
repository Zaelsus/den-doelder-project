{{--checking role if production worker--}}
@if(Auth::user()->role === 'Production')
    {{--    Production Status (either 1 is in production or Paused --}}
    @if(\App\Models\Order::isInProduction() !== 'no production')
        <div class="info-box bg-navy">
            <div class="info-box-content">
                <span class="info-box-text">Order Num. {{$order->order_number}}</span>
                <h4>
                    <span class="badge
                @if($order->status === 'Pending')
                        badge-secondary
                @elseif($order->status === 'In Production')
                        badge-info
                @elseif($order->status === 'Paused')
                        badge-warning
                @elseif($order->status === 'Done')
                        badge-success
                @endif
                        ">{{$order->status}}</span>
                </h4>
            </div>
        </div>
        <li class="nav-item">
            <div class="card bg-gray-dark" style="margin-bottom: .2rem">
                <a href="#" class="nav-link bg-black">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quick Actions
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    @if($order->status === 'Paused')
                        <li class="nav-item">
                            <form method="POST" action="{{route('orders.startProduction', $order)}}">
                                @csrf
                                <button onclick="return confirm('Are you sure you want to restart?')"
                                        class="far fas fa-arrow-alt-circle-up btn btn-success btn-block"
                                        type="submit"> restart
                                </button>
                            </form>
                        </li>
                    @endif
                    @if($order->status === 'In Production')
                        <li class="nav-item">
                            <form method="POST" action="{{route('orders.pauseProduction', $order)}}">
                                @csrf
                                <button onclick="return confirm('Are you sure you want to pause the production?')"
                                        class="far fa-pause-circle btn btn-warning btn-block "
                                        type="submit"> Pause
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{route('orders.stopProduction', $order)}}">
                                @csrf
                                <button onclick="return confirm('Is this order completed?')"
                                        class="far fa-stop-circle btn btn-danger btn-block "
                                        type="submit"> Finish Order
                                </button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="nav-item">
                <a href="{{ route('orders.show',$order) }}" class="nav-link active btn bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Order Details</p>
                </a>
                @if($order->status === 'In Production')
                    <a href="{{route('initialCheck.show')}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>View Initial Check</p>
                    </a>
                    <a href="{{route('initialCheck.create')}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>New Initial Check</p>
                    </a>
                    <a href="#" class="nav-link active bg-white btn text-left disabled">
                        <i class="nav-icon fas fa-draw-polygon"></i>
                        <p>Drawings</p>
                    </a>
                    <a href="{{route('prodCheck.show')}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>View Production Check</p>
                    </a>
                    <a href="{{route('prodCheck.create')}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>New Production Check</p>
                    </a>
                    <a href="{{ route('hourlyReports.index') }}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-check"></i>
                        <p>Hourly Check</p>
                    </a>
                @endif
            </div>
            <div class="nav-item">

                <a href="#" class="nav-link active bg-white btn text-left disabled">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Add Notes</p>
                </a>
                @if($order->status === 'In Production')
                    <a href="#" class="nav-link active bg-white btn text-left disabled">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Log Pallets</p>
                    </a>
                    <a href="#" class="nav-link active bg-white btn text-left disabled">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>Location</p>
                    </a>
                @endif
            </div>
        </li>
        {{--    No Production (either everything is Done or Pending --}}
    @else
        <li class="nav-item">
            <div class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link active btn bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Orders</p>
                </a>
            </div>
        </li>

    @endif
{{--    checks if the role is of administrator--}}
@elseif(Auth::user()->role === 'Administrator')
    <li class="nav-item">
        <div class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link active btn bg-gray-dark">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Orders</p>
            </a>
            <a href="#" class="nav-link active bg-white btn text-left disabled">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>Initial Check</p>
            </a>
        </div>
    </li>
@endif

