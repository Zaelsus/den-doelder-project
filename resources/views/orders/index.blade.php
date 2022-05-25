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
                        <a href="{{route('orders.create')}}" class="btn btn-info btn-lg btn-lg btn-block">Add a new order</a>
                    </div>
                    @endif
                    <table class="table table-bordered table-hover table-secondary">
                        <thead class="thead-dark">
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
                                <th scope="row"><a href="{{Route('orders.show',$order)}}">{{ $order->order_number }}</a></th>
                                <td>{{$order->pallet->name}}</td>
                                <td>{{$order->pallet->measurements}}</td>
                                <td>{{ $order->client_name }}</td>
                                <td>{{$order->machine}}</td>
                                <td> {{$order->start_date}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
