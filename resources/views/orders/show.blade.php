@extends('common.master')

@section('content')
    <section class="hero is-small is-bold is-primary" >
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Order Number {{$order->order_id}}</p>
                <p class="subtitle is-3">Costumer Name - {{$order->customer_name}}</p>
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Location</p>
                            <p class="title">{{$order->location}}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Created At</p>
                            <p class="title">{{$order->created_at}}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Last Update</p>
                            <p class="title">{{$order->updated_at}}</p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                            <p class="heading">Status</p>
                            <span class=" tag is-large {{$order->status === 'pending' ? 'has-background-grey-lighter':''}}">{{$order->status}}</span>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <h2>Materials and Instructions:</h2>
                        <ul>
                            <li>Pallet Type: {{ $order->pallet_type }} </li>
                            <li>Quantity to Produce: {{$order->quantity}}  </li>
                            <li>Material: {{$order->material}}  Quantity: {{$order->material_quantity}} </li>
                        </ul>
                        <h3> Instructions</h3>
                        <h4> Scheduled Production Date: {{$order->scheduled_production_date}}</h4>
                        <p>{{$order->instructions}}</p>

                        <div class="control">
                            <button class="button is-primary"
                                    onclick=window.location.href="{{route('orders.edit', $order)}}">
                                Edit Order Details
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
