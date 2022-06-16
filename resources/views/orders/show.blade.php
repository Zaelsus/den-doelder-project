@extends('layouts.app')

@section('content')
    {{--    Modal stuff--}}
    <div class="modal fade" id="startProduction" tabindex="-1" role="dialog"
         aria-labelledby="startProductionTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header colour-purple">
                    <h5 class="modal-title" id="startProductionTitle">
                        Start Production
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you sure you want to start production for order number {{$order->order_number}}?</p>

                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                        </button>
                    </div>
                    <form method="POST" action="{{route('orders.startProduction', $order)}}">
                        @csrf
                        <div class="btn-group">
                            <div>
                                <button
                                    class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                                    type="submit"> Start
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <i class="fas fa-pallet"></i>
            </div>
            <div>
                @if($order->status === 'Production Pending' && Auth::user()->role === 'Production')
                    <button type="button" class="far fas fa-arrow-alt-circle-up btn btn-success btn-block"
                            data-toggle="modal"
                            data-target="#startProduction">
                        Start
                    </button>
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

            <h5 class="card bg-gradient-purple ">{{ $order->type_order === 1 ? 'Client and Order Details' : 'Order Details'}}</h5>
            <p>{{ $order->type_order === 1  ? 'Unique order for ' . $order->client_name: 'CP Common' }}</p>
            <h5 class="card bg-gradient-purple">Materials and Instructions:</h5>
            <table>
                <tbody>
                <tr>
                    <th>Pallet Type</th>
                    <td>{{$order->pallet->name}}</td>
                </tr>
                <tr>
                    <th> Quantity to Produce -</th>
                    <td> {{$order->quantity_production}}</td>
                </tr>
                <tr>
                    <td> Quantity Produced-</td>
                    <td> {{$order->quantity_produced}}</td>
                </tr>
                </tbody>
            </table>
            <h6 class="card bg-gray">Materials:</h6>
            <table>
                <tbody>
                @foreach($order->orderMaterials as $orderMaterial)
                    <tr>
                        <th>Measurements:</th>
                        <td> {{$orderMaterial->material->measurements}}</td>
                        <th>Comments:</th>
                        <td> {{$orderMaterial->material->comments}}</td>
                        <th> Quantity Needed:</th>
                        <td>{{$orderMaterial->total_quantity}}</td>
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
