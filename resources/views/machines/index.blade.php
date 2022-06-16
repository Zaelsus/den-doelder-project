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
                {{--    Modal stuff--}}
                <div class="modal fade" id={{"machineChoice" . $machine->id}} tabindex="-1" role="dialog"
                     aria-labelledby={{"machineChoice" . $machine->id . "Title"}} aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header colour-purple">
                                <h5 class="modal-title" id={{"machineChoice" . $machine->id . "Title"}}>
                                  Choose Machine
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"
                                          class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <p> Enter to machine {{$machine->name}}?</p>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                                    </button>
                                </div>
                                <form method="POST"
                                      action="{{route('machines.selectMachine', ['machine'=>$machine, 'user'=>(Auth::user())])}}">
                                    @csrf
                                    <button class="btn  {{$machine->id === 1 ? 'btn-success mr-10':''}}
                                    {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}} float-right"
                                            type="submit"> Enter Machine {{$machine->name}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-xl">
                    <div class="container-lg ">
                        <div class="text-center ">
                            <img src="/img/pallets150.jpg"
                                 class="img-circle elevation-3" alt="Goose">
                        </div>
                        <div>
                            <button type="button"
                                    class="far fas fa-arrow-alt-circle-up btn btn-lg  {{$machine->id === 1 ? 'btn-success mr-10':''}}
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
