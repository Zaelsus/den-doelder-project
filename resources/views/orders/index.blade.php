@extends('layouts.app')

@section('header')
    Orders Overview
@endsection
@section('custom_css')
    <style>
        tr[data-href] {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <br>
                    @if(Auth::user()->role === 'Administrator')
                        <div class="has-text-right">
                            <a href="{{route('orders.create.step.one')}}" class="btn btn-info btn-lg float-right">
                                Add a new order</a>
                        </div>
                    @elseif($orders->isEmpty())
                        <div class="alert alert-default-warning text-center fade show">
                            <h2>No orders for {{Auth::user()->machine->name}} at the moment</h2>
                        </div>
                    @endif
                    @foreach($orders as $order)
                        @if($previousMachine !== $order->machine->name)
                            <?php $previousMachine = $order->machine->name?>
                            <table class="table table-bordered table-hover table-secondary">
                                <thead class="bg-gray">
                                <tr>
                                    <th
                                        colspan="{{ Auth::user()->role === 'Driver' || Auth::user()->role === 'Administrator' ? 9 : 8 }}"
                                        class="text-center bg-gradient-purple">
                                        {{$previousMachine}}
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Pallet Name</th>
                                    <th scope="col">Pallet Measurements</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Production Line</th>
                                    <th scope="col">Scheduled Production Date</th>
                                    <th scope="col">Status</th>
                                    @if(Auth::user()->role === 'Driver' || Auth::user()->role === 'Administrator')
                                        <th scope="col">Driver Status</th>
                                    @endif
                                    <th scope="col">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    @if($order->machine->name === $previousMachine)
                                        <tr class="pointer" data-href="{{Route('orders.show',$order)}}">
                                            <th scope="row"> {{ $order->order_number }} </th>
                                            <td>{{$order->pallet->name}}</td>
                                            <td>{{$order->pallet->measurements}}</td>
                                            <td>{{ $order->type_order === 1  ? 'Unique order for ' . $order->client_name: 'CP Common' }}</td>
                                            <td class="{{$order->machine->name === 'None' ? 'bg-warning':''}}">{{$order->machine->name}}</td>
                                            <td> {{$order->start_date}}</td>
                                            <td class="{{$order->status === 'Production Pending' ? 'bg-secondary':''}}
                                            {{$order->status === 'Paused' ? 'bg-warning':''}}
                                            {{$order->status === 'Admin Hold' ? 'bg-warning':''}}
                                            {{$order->status === 'Done' ? 'bg-success':''}}
                                            {{$order->status === 'In Production' ? 'bg-info':''}}
                                            {{$order->status === 'Quality Check Pending' ? 'bg-lightblue':''}}
                                            {{$order->status === 'Canceled' ? 'bg-dark':''}}">{{$order->status}}
                                                <br>
                                                @if($order->status === 'Admin Hold')
                                                    @if($order->start_date ===null)
                                                        <span class="badge badge-pill">No start date</span>
                                                    @endif
                                                    @if(count($order->orderMaterials) === 0)
                                                        <span class="badge badge-pill ">No materials chosen</span>
                                                    @endif </td>
                                                @endif
                                            @if(Auth::user()->role === 'Driver' || Auth::user()->role === 'Administrator')
                                                <td class="{{$order->truckDriver_status === null ? 'bg-secondary':''}}
                                                {{$order->truckDriver_status === 'Delivered' ? 'bg-success':''}}
                                                {{$order->truckDriver_status === 'Driving' ? 'bg-info':''}}
                                                {{$order->truckDriver_status === 'Paused' ? 'bg-warning':''}}">
                                                    @if($order->truckDriver_status === null)
                                                        No Driver
                                                    @else
                                                        {{$order->truckDriver_status}}
                                                    @endif
                                                </td>
                                            @endif
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");

            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.location.href = row.dataset.href;
                })
            })
        });
    </script>
@endsection
