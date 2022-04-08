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

    <section class="content">
        <form method="POST" action="{{route('todo.update',$order)}}">
            @csrf
            @method('PUT')

            <section class="content">
                <div class="select">
                    <select name="delivery_status" id='delivery_status' value="{{$order->delivery_status}}">
                        <option name="delivery_status" id='delivery_status' value="pending">pending</option>
                        <option name="delivery_status" id='delivery_status' value="completed">completed</option>
                        <option name="delivery_status" id='delivery_status' value="onhold">onhold</option>
                    </select>
                </div>
                <div class="select">
                    <select name="delivered_by" id='delivered_by' value="{{$order->delivered_by}}">
                        @foreach ($trucks as $truck)
                        <option name="driver_name" id='driver_name' value="{{$truck->driver_name}}">{{$truck->driver_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" style="cursor: pointer; border: 2px solid black; font-size: 20px; color: white;background-color: black;">Submit</button>
            </section>
        </form>
    </section>



@endsection('body')
