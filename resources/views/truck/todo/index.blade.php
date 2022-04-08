@extends ('truck.layouts.layout')

@section('title')
    <title>Truck | TODO</title>
@endsection

{{--// added mine to test--}}
@section('link')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('body')
    <section class="section has-text-white has-background-black ">
        <h1 class="title has-text-white ">TO DO</h1>
        <h2 class="subtitle has-text-white">
            A list of task(s) that have not been started
        </h2>
    </section>

    @foreach ($orders as $order)
        <div class="tile is-parent is-centered box ">
            <article class="tile is-child notification is-info is-half" style="background-color:white; color:black">
                <div class=""><h2>DELIVERY #{{$order->order_id}}</h2></div>
                <div class="date-desc"><h2>Due by: {{$order->scheduled_production_date}} <button class="button is-normal is-clickable is-success" style="border: none;float: right;">
                            <a href="/truck/todo/{{$order->id}}" style="text-decoration: none;" >VIEW DETAILS </a>
                        </button></h2>
                </div>
            </article>
        </div>
    @endforeach

@endsection('body')
