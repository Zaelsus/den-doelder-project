@extends('layouts.machine')

@section('header')
    <h1> Hello {{Auth::user()->name}}!</h1>
    <h2>Please choose Your Production Machine</h2>
@endsection

@section('content')
    @if(Auth::user()->role ==='Production')
    @foreach($machines as $machine)
    <form method="POST" action="{{route('machines.selectMachine', ['machine'=>$machine, 'user'=>(Auth::user())])}}">
        @csrf
        <button onclick="return confirm('Choose production line {{$machine->name}}?')"
                class="far fas fa-arrow-alt-circle-up btn btn-default  {{$machine->id === 1 ? 'btn-success':''}}
                {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}}"
                type="submit"> Enter Machine {{$machine->name}}
        </button>
    </form>
    @endforeach
        @elseif(Auth::user()->role ==='Administrator')
        <a href="{{ route('orders.index') }}" class="btn bg-gray-dark">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Enter Administration View</p>
        </a>
        @endif
    </section>
@endsection
