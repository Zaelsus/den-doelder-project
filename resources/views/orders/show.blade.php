@extends('layouts.app')

@section('content')
    <br>
    <div class="card ">
        <div class="card-header bg-gradient-info">
            <h3 class="  text-center ">Order Details for {{$order->order_number}}</h3>
            <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
            </div>
        </div>
        <div class="card-body">
            <div class="card-subtitle float-right border-left">
                <h5 class="card create-order-card-titles ">General Info</h5>
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
            <h5 class="card bg-gradient-info ">Client and Order Details</h5>
            <p>Client Name - {{$order->client_name}}</p>
            <p>Address - {{$order->client_address}}</p>

            <h5 class="card bg-gradient-info">Materials and Instructions:</h5>
            <table>
                <tbody>
                <tr>
                    <td>Pallet Type</td>
                    <td>{{$order->pallet->name}}</td>
                </tr>
                <tr>
                    <td> Quantity to Produce </td>
                    <td> {{$order->quantity_production}}</td>
                </tr>
                </tbody>
            </table>
            <h6 class="card shade">Materials:</h6>
            <table>
            <tbody>

                @foreach($order->orderMaterials as $orderMaterial)
                    <tr>
                        <td>Measurements {{$orderMaterial->material->measurements}}</td>
                        <td>Comments {{$orderMaterial->material->comments}}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <p>{{$order->production_instructions}}</p>
            <div class="text-center">
            <strong class="text-center"> Scheduled Production Date: {{$order->start_date}}</strong>
            </div>

            @if(Auth::user()->role === 'Administrator')
                <div class="control">
                    <button class="btn btn-info btn-lg float-right"
                            onclick=window.location.href="{{route('orders.edit', $order)}}">
                        Edit Order Details
                    </button>
                </div>
            @endif
        </div>

    </div>
    @endsection
