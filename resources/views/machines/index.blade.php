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
    @if(Auth::user()->role ==='Production' || Auth::user()->role ==='Driver')
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
                @extends(Auth::user()->role ==='Production' || Auth::user()->role ==='Driver' ? 'modals.machines':'blank')
                <div class="container-xl">
                    <div class="container-lg ">
                        <div class="text-center ">
                            <img src="/img/pallets150.jpg"
                                 class="img-circle elevation-3" alt="Goose">
                        </div>
                        <div>
                            <button type="button"
                                    class="far fas fa-arrow-alt-circle-up btn btn-lg  {{$machine->id === 1 ? 'btn-success':''}}
                                    {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}}"
                                    data-toggle="modal"
                                    data-target={{"#machineChoice" . $machine->id}}>
                                Enter Machine {{$machine->name}}
                            </button>
                        </div>
                    </div>
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
