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
        <a href="{{ route('orders.index') }}" class="btn bg-gray-dark">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Enter Administration View</p>
        </a>
        @endif
        </section>
@endsection
