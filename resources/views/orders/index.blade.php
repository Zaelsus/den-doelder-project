@extends('layouts.app')

@section('header')
    Orders Overview
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    @if(Auth::user()->role === 'Administrator')
                        <div class="has-text-right">
                            <a href="{{route('orders.create.step.one')}}" class="btn btn-info btn-lg float-right">Add a new
                                order</a>
                        </div>
                        @foreach($orders as $order)
                            @if($previousMachine !== $order->machine)
                                <?php $previousMachine = $order->machine?>
                                <table class="table table-bordered table-hover table-secondary">
                                    <thead class="bg-gray">
                                    <tr>
                                        <th colspan="8" class="text-center bg-gradient-purple">{{$previousMachine}}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Pallet Name</th>
                                        <th scope="col">Pallet Measurements</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Production Line</th>
                                        <th scope="col">Scheduled Production Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        @if($order->machine === $previousMachine)
                                            <tr>
                                                <th scope="row"><a
                                                        href="{{Route('orders.show',$order)}}">{{ $order->order_number }}</a>
                                                </th>
                                                <td>{{$order->pallet->name}}</td>
                                                <td>{{$order->pallet->measurements}}</td>
                                                <td>{{ $order->client_name }}</td>
                                                <td>{{$order->machine}}</td>
                                                <td> {{$order->start_date}}</td>
                                                <td class = "{{$order->status === 'Production Pending' ? 'bg-secondary':''}}
                                                {{$order->status === 'Paused' ? 'bg-warning':''}}
                                                {{$order->status === 'Admin Hold' ? 'bg-warning':''}}
                                                {{$order->status === 'Done' ? 'bg-success':''}}
                                                {{$order->status === 'In Production' ? 'bg-info':''}}
                                                {{$order->status === 'Quality Check Pending' ? 'bg-lightblue':''}}
                                                {{$order->status === 'Canceled' ? 'bg-dark':''}}">{{$order->status}}</td>
                                                <td>{{$order->created_at}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                    @else
                        <table class="table table-bordered table-hover table-secondary">
                            <thead class="bg-gray">
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Pallet Name</th>
                                <th scope="col">Pallet Measurements</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Production Line</th>
                                <th scope="col">Scheduled Production Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row"><a
                                            href="{{Route('orders.show',$order)}}">{{ $order->order_number }}</a>
                                    </th>
                                    <td>{{$order->pallet->name}}</td>
                                    <td>{{$order->pallet->measurements}}</td>
                                    <td>{{ $order->client_name }}</td>
                                    <td>{{$order->machine}}</td>
                                    <td> {{$order->start_date}}</td>
                                    <td class = "{{$order->status === 'Production Pending' ? 'bg-secondary':''}}
                                    {{$order->status === 'Paused' ? 'bg-warning':''}}
                                    {{$order->status === 'Admin Hold' ? 'bg-warning':''}}
                                    {{$order->status === 'Done' ? 'bg-success':''}}
                                    {{$order->status === 'In Production' ? 'bg-info':''}}
                                    {{$order->status === 'Quality Check Pending' ? 'bg-lightblue':''}}
                                    {{$order->status === 'Canceled' ? 'bg-dark':''}}">{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
