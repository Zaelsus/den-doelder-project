@extends('layouts.app')

@section('content')
    <br>
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
            <div class="card-header small-box bg-gradient-purple">
                <div class="inner">
                    <h3 class="">Order {{$order->order_number}}</h3>
                    <h2 class="float-right">
                    <span class=" badge badge-pill
                @if($order->status === 'Pending')
                        badge-secondary
                @elseif($order->status === 'In Production')
                        badge-info
                @elseif($order->status === 'Paused')
                        badge-warning
                @elseif($order->status === 'Done')
                        badge-success
                @endif  ">{{$order->status}}</span></h2>
                    <p>{{$order->site_location}}</p>
                    <div class="text-center">
                    <span class="badge badge-pill badge-primary">Created At - {{$order->created_at}}</span>
                    <span class="badge badge-pill badge-primary">Last Update - {{$order->updated_at}}</span>
                    <span class="badge badge-pill badge-primary">Started production At - {{$order->start_time}}</span>
                    </div>
                </div>
                <div class="icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div>
                    @if($order->status === 'Pending' && Auth::user()->role === 'Production')
                        <form method="POST" action="{{route('orders.startProduction', $order)}}">
                            @csrf
                            <button onclick="return confirm('Start production for order {{$order->order_number}}?')"
                                    class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                                    type="submit"> Start
                            </button>
                        </form>
                    @elseif(Auth::user()->role === 'Administrator' && $order->selected === 0)
                        <form class="text-center" method="POST" action="{{route('orders.selectOrder', $order)}}">
                            @csrf
                            <button class="far fas btn btn-success btn-block"
                                    type="submit"> Enter Order View
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        <div class="card-body">
            <div class="card-subtitle border-left">
            </div>

            <h5 class="card bg-gradient-purple ">Client and Order Details</h5>
            <p>Client Name - {{$order->client_name}}</p>
            <p>Address - {{$order->client_address}}</p>

            <h5 class="card bg-gradient-purple">Materials and Instructions:</h5>
            <table>
                <tbody>
                <tr>
                    <td>Pallet Type -</td>
                    <td>{{$order->pallet->name}}</td>
                </tr>
                <tr>
                    <td> Quantity to Produce -</td>
                    <td> {{$order->quantity_production}}</td>
                </tr>
                </tbody>
            </table>
            <h6 class="card bg-gray">Materials:</h6>
            <table>
                <tbody>

                @foreach($order->orderMaterials as $orderMaterial)
                    <tr>
                        <td>Measurements: {{$orderMaterial->material->measurements}}</td>
                        <td>Comments: {{$orderMaterial->material->comments}}</td>
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
