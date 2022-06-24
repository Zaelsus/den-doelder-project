@extends('layouts.app')

@section('content')
    @extends('modals.orders')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Edit the
                    order {{$order->order_number}}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('orders.update.step.one.post',$order) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="order_number">Order Number</label>
                            <div>
                                <input type="text" class="form-control is-invalid "
                                       name="order_number"
                                       placeholder="Number of Order e.g Order-4891" value="{{$order->order_number}}"
                                       required>
                            </div>
                            @error('order_number')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="required" for="status">Order Status</label>
                            <div>
                                <select name="status" class="custom-select @error('status') is-invalid @enderror">
                                    @if($order->status === 'Admin Hold' && ($order->start_time !== null) && (\App\Models\Order::getOrder($order->machine) === null))
                                        <option
                                            value='In Production' {{$order->status === 'In Production' ? 'selected':''}}>
                                            In Production
                                        </option>
                                    @endif
                                    @if($order->status === 'In Production' || $order->status === 'Done' || $order->status === 'Paused'||$order->status === 'Canceled'||$order->status === 'Admin Hold')
                                        <option value='{{$order->status}}' selected>{{$order->status}}
                                        </option>
                                        @if(($order->status === 'Done' ||($order->status === 'Canceled' && $order->start_time !== null)) && (\App\Models\Order::getOrder($order->machine) === null))
                                            <option
                                                value='In Production' {{$order->status === 'In Production' ? 'selected':''}}>
                                                In Production
                                            </option>
                                        @endif
                                        @if($order->status === 'Canceled')
                                            <option
                                                value='Production Pending' {{$order->status === 'Admin Hold' ? 'selected':''}}>
                                               Reopen Order
                                            </option>
                                        @endif

                                    @else
                                        @if(!(\App\Models\Order::initialCheckExists($order)))
                                            <option
                                                value='Quality Check Pending' {{$order->status === 'Quality Check Pending' ? 'selected':''}}>
                                                Quality Check Pending
                                            </option>
                                        @elseif($order->start_date !==null && $order->machine->name !=='None' && count($order->orderMaterials) >0)
                                            <option
                                                value='Production Pending' {{$order->status === 'Production Pending' ? 'selected':''}}>
                                                Production Pending
                                            </option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                            @error('status')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <h5 class="card create-order-card-titles text-center">Client and Order Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="type_order">Is this a special order (not CP)?</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input onclick=isCheckedEdit() type="radio" id="t1" name="type_order"
                                           class="custom-control-input" value=1
                                           {{$order->type_order===1 ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="t1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input onclick=isCheckedEdit() type="radio" id="t2" name="type_order"
                                           class="custom-control-input" value=0
                                           {{$order->type_order===0 ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="t2">No</label>
                                </div>
                            </div>
                            @error('type_order')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div id="clientName-box" style="{{$order->type_order===0 ? 'display:none':'block'}}"
                        class="col-md-6 mb-3">
                            <label class="required" for="client_name">Client Name for this order</label>
                            <div>
                                <input id="clientName" type="text" class="form-control is-invalid"
                                       name="client_name"
                                       placeholder="client name" value="{{$order->client_name}}">
                            </div>
                            @error('client_name')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="pallet_id">Pallet Required</label>
                            <div>
                                <select name="pallet_id" class="custom-select @error('pallet_id') is-invalid @enderror"
                                        required>
                                    @foreach($pallets as $pallet)
                                        <option
                                            value={{$pallet->id}} {{$order->pallet_id === $pallet->id ? 'selected':''}}>{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('pallet_id')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required" for="quantity_production">Quantity for production</label>
                            <div>
                                <input type="number" min="1"
                                       class="form-control is-invalid @error('quantity_production') is-invalid @enderror"
                                       name="quantity_production"
                                       placeholder="quantity for production e.g 100"
                                       value="{{$order->quantity_production}}" required>
                            </div>
                            @error('quantity_production')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <h5 class="card create-order-card-titles text-center">Production Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="site_location">Select site of Production</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="site_location"
                                           class="custom-control-input" value="Axel"
                                           {{ $order->site_location ==="Axel" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="customRadioInline1">Axel</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="site_location"
                                           class="custom-control-input" value="Zelzate"
                                           {{ $order->site_location==="Zelzate" ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="customRadioInline2">Zelzate</label>
                                </div>
                            </div>
                            @error('site_location')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="machine">Production machine</label>
                            <div>
                                <select name="machine_id"
                                        class="custom-select @error('machine_id') is-invalid @enderror">
                                    @foreach($machines as $machine)
                                        <option
                                            value={{$machine->id}} {{$order->machine_id === $machine->id ? 'selected':''}}>{{$machine->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('machine_id')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="start_date">Schedule Production Date</label>
                            <div class="control">
                                <input name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                       type="date" placeholder="Date for production" value="{{$order->start_date}}">
                            </div>
                            @error('start_date')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="production_instructions">Additional Production Instructions</label>
                        <div>
                        <textarea name="production_instructions"
                                  class="form-control @error('production_instructions') is-invalid @enderror"
                                  type="text"
                                  placeholder="Fill in if there are any additional instructions">{{$order->production_instructions}}  </textarea>
                        </div>
                        @error('production_instructions')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                    <br>
                    <div class="float-left">
                        <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                        <a type="button" href="{{ route('orders.show', $order) }}"
                           class="btn btn-light btn-lg">Cancel</a>
                    </div>
                </form>

                <button type="button" class="btn btn-danger btn-lg float-right"
                        data-toggle="modal"
                        data-target="#cancelOrder">
                    Disable Order
                </button>
            </div>
        </div>
    </div>

    <script src="/js/orderEdit.js"></script>

@endsection
