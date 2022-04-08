@extends('common.master')

@section('content')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Orders</p>
                <p class="subtitle is-3">overview of the orders</p>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                        <a href="/orders/create" class="button is-primary">Add a new order</a>
                    </div>
                    <table class="table is-fullwidth is-striped">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Costomer Name</th>
                            <th>Production Line</th>
                            <th>Scheduled Production Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="orders/{{ $order->id }}">{{ $order->order_id }}</a></td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{$order->order_production_line}}</td>
                                <td> {{$order->scheduled_production_date}}</td>
                                <td>{{$order->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection
