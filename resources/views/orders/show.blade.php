@extends('layouts.app')

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
                <p class="heading">Started production:{{$order->start_time}}</p>
                <h2>
                    <span class="badge
                @if($order->status === 'Pending')
                        badge-secondary
                @elseif($order->status === 'In Production')
                        badge-info
                @elseif($order->status === 'Paused')
                        badge-warning
@elseif($order->status === 'Done')
                        badge-success
@endif
                        ">{{$order->status}}</span>
                </h2>
            </div>
            <div>
                <hr>
                <p>Client Name - {{$order->client_name}}</p>
                <p>Address - {{$order->client_address}}</p>
            </div>
        </div>

        <div class="card-body">
            {{--            The body of the card--}}
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
            @if(Auth::user()->role === 'Administrator')
            <div class="control">
                <button class="button is-primary"
                        onclick=window.location.href="{{route('orders.edit', $order)}}">
                    Edit Order Details
                </button>
            </div>
            @endif

        </div>
        <div class="card-footer">
            {{--            The footer of the card--}}
        </div>
        <!-- /.card-footer -->
        @if($order->status === 'Pending' && Auth::user()->role === 'Production')
            <form method="POST" action="{{route('orders.startProduction', $order)}}">
                @csrf
                <button onclick="return confirm('Start production for order {{$order->order_number}}?')"
                        class="far fas fa-arrow-alt-circle-up btn btn-success btn-bloc"
                        type="submit"> Start
                </button>
            </form>
        @endif
    </div>
    <!-- /.card -->
@endsection
