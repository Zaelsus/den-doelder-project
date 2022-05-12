@extends('layouts.app')

@section('header')
    Orders Overview
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Pallet Name</th>
                            <th>Pallet Measurements</th>
                            <th>Customer Name</th>
                            <th>Production Line</th>
                            <th>Scheduled Production Date</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="orders/{{ $order->id }}">{{ $order->order_number }}</a></td>
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
