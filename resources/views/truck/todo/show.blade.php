@extends ('truck.layouts.layout')

@section('title')
    <title>Truck | TODO</title>
@endsection

{{--// added mine to test--}}
@section('link')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('body')
    <section class="section has-background-black mb-6">
        <h1 class="title has-text-white">ORDER ID #{{$order->order_id}}</h1>
    </section>

        <article class="container mt-6s">
            <div class="notification is-primary box" style="font-size: 25px;background-color: white;color:black">
            <div class="" >
                <h2>STATUS: {{$order->delivery_status}} <button class="button is-normal is-clickable has-background-warning" style="border: none;float: right"><a href="{{route('todo.edit',$order)}}" style="text-decoration: none">EDIT</a></button></h2>
            </div>
            <div class=""><h2>PALLET DETAILS: {{$order->pallet_type}}</h2>
            </div>
            <div class=""><h2>MATERIAL DETAIL: {{$order->material}}</h2></div>
            <div class=""><h2>QUANTITY OF MATERIAL: {{$order->quantity}}</h2></div>
            <div class=""><h2>DELIVERY LOCATION: {{$order->location}}</h2></div>
            <div class=""><h2>DUE BY: {{$order->scheduled_production_date}}</h2></div>
{{--            <div class="has-text-centered">--}}
{{--                <button class="button is-medium is-clickable has-background-link mr-2" style="border: none">CREATE NOTE</button>--}}
{{--                <button class="button is-medium is-clickable has-background-warning" style="border: none">VIEW NOTE(S)</button>--}}
{{--            </div>--}}
            </div>
        </article>
@endsection('body')
