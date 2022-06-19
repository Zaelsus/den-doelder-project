{{--    Modal for finishing an order--}}
<div class="modal fade" id="finishOrder" tabindex="-1" role="dialog"
     aria-labelledby="finishOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="finishOrderTitle">
                    Finish Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to finish order number {{$order->order_number}}?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST"
                      action="{{route('orders.stopProduction', ['order'=>$order,'machine'=>Auth::user()->machine])}}">
                    @csrf
                    <button class="btn btn-danger float-right"
                            type="submit"> Finish Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(((Auth::user()->role === 'Production') && (\App\Models\Order::isInProduction(Auth::user()->machine) !== 'no production'))
|| ((Auth::user()->role === 'Administrator') && ($order !== null)))
    <div class="info-box shade brand-text">
        <div class="info-box-content">
            <h4><span class="info-box-text">Order #{{$order->order_number}}</span></h4>
            <h4>
                    <span class="align-content-lg-stretch d-flex justify-content-center badge
                @if($order->status === 'Production Pending')
                        badge-secondary
                @elseif($order->status === 'In Production')
                        badge-info
                @elseif(($order->status === 'Paused') || ($order->status === 'Admin Hold'))
                        badge-warning
                @elseif($order->status === 'Done')
                        badge-success
                @elseif($order->status === 'Quality Check Pending')
                        bg-lightblue
                @elseif($order->status === 'Canceled')
                        badge-dark
                @endif
                        ">{{$order->status}}</span>
            </h4>
        </div>
    </div>
@endif
{{--checking role if production worker--}}
@if(Auth::user()->role === 'Production')
    {{--    Production Status (either 1 is in production or Paused --}}
    @if(\App\Models\Order::isInProduction(Auth::user()->machine) !== 'no production')
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
                                        type="submit"> Restart
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
                            <button type="button" class="far fa-stop-circle btn btn-danger btn-block "
                                    data-toggle="modal"
                                    data-target="#finishOrder">
                                Finish Order
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="nav-item">
                <a href="{{ route('orders.show', $order) }}" class="nav-link active btn text-left bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Order Details</p>
                </a>
                @if($order->status === 'In Production')
                    <a href="{{route('initial.show', $order->id)}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p> Initial Check</p>
                    </a>
                    <a href="{{route('pallets.show', $order->pallet)}}"
                       class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-draw-polygon"></i>
                        <p>Drawings</p>
                    </a>

                    @if(\App\Models\Order::prodCheckExists($order))
                        <a href="{{route('production.show', $order->id)}}"
                           class="nav-link active bg-gray-dark btn text-left">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Production Check</p>
                        </a>
                    @else
                        <a href="{{route('production.create')}}" class="nav-link active bg-gray-dark btn text-left">
                            <i class="nav-icon fas fa-tools"></i>
                            <p> Add Production Check</p>
                        </a>
                    @endif
                    <a href="{{ route('hourlyReports.list', $order) }}"
                       class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-check"></i>
                        <p>Hourly Check</p>
                    </a>
                @endif
            </div>
            <div class="nav-item">

                <a href="{{route('notes.index')}}" class="nav-link active bg-gray-dark btn text-left">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Notes</p>
                </a>
                @if($order->status === 'In Production')
                    <a href="{{route('orders.editquantity',$order)}}"
                       class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>Log Pallets</p>
                    </a>
                    <a href="{{route('productLocations.show',$order)}}"
                       class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>Location</p>
                    </a>
                @endif
            </div>
        </li>
        {{--    No Production (no In Production Or Pause) --}}
    @else
        <li class="nav-item">
            <div class="nav-item">
                <a href="{{ route('machines.show', ['machine' =>Auth::user()->machine]) }}"
                   class="nav-link active btn bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Orders</p>
                </a>
            </div>
        </li>
    @endif
    {{--    checks if the role is of administrator--}}
@elseif(Auth::user()->role === 'Administrator')
    @if($order === null)
        <li class="nav-item">
            <div class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link active btn bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Orders</p>
                </a>
            </div>
        </li>
    @else
        <li class="nav-item">
            <div class="nav-item">
                <form method="POST" action="{{route('orders.unselectOrder', $order)}}"
                      class="nav-link active btn text-left bg-success">
                    @csrf

                    <button type="submit" class="button-without-style">
                        <i class="nav-icon fas fa-arrow-alt-circle-up text-left"></i>
                        <p class="brand-text">Back to Overview</p>
                    </button>
                </form>

                <a href="{{ route('orders.show',$order) }}" class="nav-link active btn text-left bg-gray-dark">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Order Details</p>
                </a>
                @if(\App\Models\Order::initialCheckExists($order))
                    <a href="{{route('initial.show', $order->id)}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p> Initial Check</p>
                    </a>
                @else
                    <a href="{{route('initial.create')}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p> Add Initial Check</p>
                    </a>
                @endif
                <a href="{{route('pallets.show', $order->pallet)}}" class="nav-link active bg-gray-dark btn text-left">
                    <i class="nav-icon fas fa-draw-polygon"></i>
                    <p>Drawings</p>
                </a>
                @if($order->production != null)
                    <a href="{{route('production.show', $order)}}" class="nav-link active bg-gray-dark btn text-left">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Production Check</p>
                    </a>
                @endif

                <a href="{{ route('hourlyReports.list', $order) }}" class="nav-link active bg-gray-dark btn text-left">
                    <i class="nav-icon fas fa-check"></i>
                    <p>Hourly Check</p>
                </a>
                <a href="{{route('notes.index')}}" class="nav-link active bg-gray-dark btn text-left">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Notes</p>

                </a>
            </div>
        </li>
    @endif

@endif

