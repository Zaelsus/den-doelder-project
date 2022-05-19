@extends('layouts.home.app')

@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <h2 class="card-title">Order Number {{$order->order_number}}</h2>
            <!-- /.card-tools -->
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <p class="heading">Location: {{$order->site_location}}</p>
                <p class="heading">Created At: {{$order->created_at}}</p>
                <p class="heading">Last Update:{{$order->updated_at}}</p>
                <span class="badge badge-primary {{$order->status === 'pending' ? 'has-background-grey-lighter':''}}">{{$order->status}}</span>
            </div>
            <div>
                <hr>
            <p>Client Name - {{$order->client_name}}</p>
            <p>Address - {{$order->client_address}}</p>
            </div>
        </div>

        <div class="card-body">
            The body of the card
        </div>
        <!-- /.card-body -->
        <div class="content">
            <h4>Materials and Instructions:</h4>
            <ul>
                <li>Pallet Type: {{ $order->pallet->name }} </li>
                <li>Quantity to Produce: {{$order->quantity_production}}  </li>
            </ul>
            <h4>Materials:</h4>
            <ul>
                @foreach($order->orderMaterials as $orderMaterial)
                    <ul>
                        <li>Measurements: {{$orderMaterial->material->measurements}}</li>
                        <li>Comments: {{$orderMaterial->material->comments}}</li>
                    </ul>
                @endforeach
            </ul>
            <h4> Instructions</h4>
            <h5> Scheduled Production Date: {{$order->start_date}}</h5>
            <p>{{$order->production_instructions}}</p>
        </div>
        <div class="card-footer">
{{--            The footer of the card--}}
        </div>
        <!-- /.card-footer -->
        <a class="btn btn-success fas fa-circle" onclick={!! `$order::startProduction()`!!}></a>
    </div>
    <!-- /.card -->
@endsection
