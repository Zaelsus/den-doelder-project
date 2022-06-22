@extends('layouts.app')

@section('content')
    @extends('modals.orders')
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
                <h2 class="float-right" style="margin-left: 10px">
                    <span class=" badge badge-pill
                @if($order->status === 'Production Pending')
                        badge-secondary
                @elseif($order->status === 'In Production')
                        badge-info
                @elseif($order->status === 'Paused' || $order->status === 'Admin Hold')
                        badge-warning
                @elseif($order->status === 'Done')
                        badge-success
                @elseif($order->status === 'Quality Check Pending')
                        bg-lightblue
                @elseif($order->status === 'Canceled')
                        badge-dark
                @endif  ">{{$order->status}}</span></h2>
                <h2 class="float-right">
                    <span class=" badge badge-pill
                @if($order->truckDriver_status === null)
                        badge-secondary
                @elseif($order->truckDriver_status === 'Driving')
                        badge-info
                @elseif($order->truckDriver_status === 'Delivered')
                        badge-success
                        @elseif($order->truckDriver_status === 'Paused')
                        badge-warning
                @endif  ">
                        @if($order->truckDriver_status === null)
                            No Driver
                        @else
                            {{$order->truckDriver_status}}
                        @endif
                    </span>
                </h2>
                <p>{{$order->site_location}}</p>
                <div class="text-center">
                    <span class="badge badge-pill badge-primary">Created At - {{$order->created_at}}</span>
                    <span class="badge badge-pill badge-primary">Last Update - {{$order->updated_at}}</span>
                    @if($order->start_time !==null)
                        <span
                            class="badge badge-pill badge-primary">Started production At - {{$order->start_time}}</span>
                    @endif
                    @if(\App\Models\Order::initialCheckExists($order)===false)
                        <span class="badge badge-pill badge-warning">No initial check</span>
                    @endif
                    @if($order->start_date ===null)
                        <span class="badge badge-pill badge-warning">No start date</span>
                    @endif
                    @if($order->machine->name ==='None')
                        <span class="badge badge-pill badge-warning">No machine selected</span>
                    @else
                        <span class="badge badge-pill badge-success">{{$order->machine->name}}</span>
                    @endif
                    @if(count($order->orderMaterials) === 0)
                        <span class="badge badge-pill badge-warning">No materials chosen</span>
                    @endif
                </div>
            </div>
            <div class="icon">
                {{--                {{dd($order->machine->orders)}}--}}
                <i class="fas fa-pallet"></i>
            </div>
            <div>
                @if($order->status === 'Production Pending' && Auth::user()->role === 'Production')
                    <button type="button" class="far fas fa-arrow-alt-circle-up btn btn-success btn-block"
                            data-toggle="modal"
                            data-target="#startProduction">
                        Start
                    </button>
                @elseif(($order->status === 'Production Pending' || $order->status === 'In Production' || $order->status === 'Done') && Auth::user()->role === 'Driver' && ($order->truckDriver_status === null || $order->truckDriver_status === 'Paused') && App\Models\TruckDriver::getDrivingOrder($order->machine) === null)
                    <form method="POST" action="{{route('orders.startDriving', $order)}}">
                        @csrf
                        <button onclick="return confirm('Start driving for order {{$order->order_number}}?')"
                                class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                                type="submit"> Start Driving
                        </button>
                    </form>
                @elseif(($order->status === 'Production Pending' || $order->status === 'In Production' || $order->status === 'Delivered') && Auth::user()->role === 'Driver' && $order->truckDriver_status === 'Paused' && App\Models\TruckDriver::findDriverOrder() === null)
                    <form method="POST" action="{{route('orders.startDriving', $order)}}">
                        @csrf
                        <button onclick="return confirm('Restart driving for order {{$order->order_number}}?')"
                                class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                                type="submit"> Restart Driving
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
            @if(Auth::user()->role !== "Driver")
                <h5 class="card bg-gradient-purple ">{{ $order->type_order === 1 ? 'Client and Order Details' : 'Order Details'}}</h5>
                <p>{{ $order->type_order === 1  ? 'Unique order for ' . $order->client_name: 'CP Common' }}</p>
            @endif

            <h5 class="card bg-gradient-purple">Materials and Instructions:</h5>
            <table>
                <tbody>
                <tr>
                    <th>Pallet Type:</th>
                    <td>{{$order->pallet->name}}</td>
                </tr>
                <tr>
                    <th> Quantity to Produce:</th>
                    <td> {{$order->quantity_production}}</td>
                </tr>
                <tr>
                    <th> Quantity Produced:</th>
                    <td> {{$order->quantity_produced}}</td>
                </tr>
                </tbody>
            </table>
            <h6 class="card bg-gray" style="padding-left: 3px; padding-top: 3px; padding-bottom: 3px">Materials:</h6>
            <table>
                <tbody>
                @foreach($order->orderMaterials as $orderMaterial)
                    <tr>
                        <th>Measurements:</th>
                        <td> {{$orderMaterial->material->measurements}}</td>
                    </tr>
                    @if($orderMaterial->material->comments !== "")
                        <tr>
                            <th>Comments:</th>
                            <td> {{$orderMaterial->material->comments}}</td>
                        </tr>
                    @endif
                    <tr>
                        <th> Quantity Needed:</th>
                        <td> {{$orderMaterial->total_quantity}}</td>
                    </tr>
                    @if(Auth::user()->role === 'Driver')
                        <tr>
                            <th> Locations:</th>
                            <td>
                                <ul>
                                    @if($materialLocationsList!==null)
                                        @if(!($materialLocationsList[$orderMaterial->material_id]->isempty()))
                                            @for($i = 0; $i < count($materialLocationsList[$orderMaterial->material_id]);$i++)
                                                <li> Location
                                                    - {{ $materialsLocations[$orderMaterial->material_id.'_'.$materialLocationsList[$orderMaterial->material_id][$i]->location_id.'_'.'name']}}
                                                    Existing Stock
                                                    - {{$materialsLocations[$orderMaterial->material_id.'_'.$materialLocationsList[$orderMaterial->material_id][$i]->location_id.'_'.'quantity']}}</li>
                                            @endfor
                                        @else
                                            No locations for this material yet
                                        @endif
                                    @endif
                                </ul>

                            </td>
                        </tr>
                    @endif
                    <tr style="border-bottom: solid"></tr>
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
                            onclick=window.location.href="{{route('orders.edit.step.one', $order)}}">
                        Edit Order Details
                    </button>
                </div>
            @endif
        </div>

    </div>
@endsection
