@extends('layouts.machine')

@section('header')
    <ul class="navbar-nav">
        <li class="headerCenter text-ce">
            <h1> Welcome {{Auth::user()->name}}!</h1>
            <h4>Please choose Your Production Machine</h4>
        </li>
    </ul>
@endsection

@section('content')
    {{--    Modal stuff--}}
    <div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog"
         aria-labelledby="cancelOrderTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header colour-purple">
                    <h5 class="modal-title" id="cancelOrderTitle">
                        Disable Order
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you sure you want to cancel order number {{$order->order_number}}?</p>

                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                        </button>
                    </div>
                    <form method="POST" action="{{route('orders.cancelOrder', $order)}}">
                        @csrf
                        <button class="btn btn-danger btn-lg float-right"
                                type="submit"> Disable Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->role ==='Production')
        @if(Auth::user()->machine !== null)
            <div class="alert alert-default-info alert-dismissible fade show">
                Last Session You were in {{ Auth::user()->machine->name }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="btn-group">
            @foreach($machines as $machine)

                <div class="container-xl">
                    <form method="POST"
                          action="{{route('machines.selectMachine', ['machine'=>$machine, 'user'=>(Auth::user())])}}">
                        @csrf
                        <div class="container-lg ">
                            <div class="text-center ">
                                <img src="/img/pallets150.jpg"
                                     class="img-circle elevation-3" alt="Goose">
                            </div>
                            <div>
                                <button onclick="return confirm('Choose production line {{$machine->name}}?')"
                                        class="far fas fa-arrow-alt-circle-up btn btn-lg  {{$machine->id === 1 ? 'btn-success mr-10':''}}
                                        {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}}"
                                        type="submit"> Enter Machine {{$machine->name}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    @elseif(Auth::user()->role ==='Administrator')
        @php
             $order = App\Models\Order::isSelected();
             @endphp
        @if($order !== null)
        <form method="POST" action="{{route('orders.unselectOrder', $order)}}"
              class="nav-link active btn">
            @csrf
            <button type="submit" class="btn bg-gray-dark">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p class="brand-text">Enter Administration View</p>
            </button>
        </form>
        @else
            <a href="{{ route('orders.index') }}" class="btn bg-gray-dark">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Enter Administration View</p>
            </a>
            @endif
        @endif
        </section>
@endsection
