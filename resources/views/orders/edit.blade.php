@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Edit the
                    order {{$order->order_number . ' of customer ' . $order->client_name}}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('orders.update',$order) }}">
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
                                    @if($order->status === 'In Production' || $order->status === 'Done')
                                        <option value='{{$order->status}}' selected>{{$order->status}}
                                        </option>
                                        @if($order->status === 'Done')
                                            <option
                                                value='Production Pending' {{$order->status === 'Production Pending' ? 'selected':''}}>
                                                Production Pending
                                            </option>
                                        @endif

                                    @else
                                        <option
                                            value='Quality Check Pending' {{$order->status === 'Quality Check Pending' ? 'selected':''}}>
                                            Quality Check Pending
                                        </option>
                                        @if(\App\Models\Order::initialCheckExists($order) && $order->start_date !==null && $order->machine !==null)
                                            <option
                                                value='Production Pending' {{$order->status === 'Production Pending' ? 'selected':''}}>
                                                Production Pending
                                            </option>
                                        @endif
                                    @endif
                                    <option value='Admin Hold' {{$order->status === 'Admin Hold' ? 'selected':''}}>Admin
                                        Hold
                                    </option>
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
                            <label class="required" for="client_name">Client Name</label>
                            <div>
                                <input type="text" class="form-control is-invalid"
                                       name="client_name"
                                       placeholder="client name" value="{{$order->client_name}}"
                                       required>
                            </div>
                            @error('client_name')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required" for="client_address">Client Address</label>
                            <div>
                                <input type="text"
                                       class="form-control is-invalid @error('client_address') is-invalid @enderror"
                                       name="client_address"
                                       placeholder="client address" value="{{$order->client_address}}" required>
                            </div>
                            @error('client_address')
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
                                    <option value="">choose a pallet</option>
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
                                <select name="machine" class="custom-select @error('machine') is-invalid @enderror">
                                    <option value='' >Select Production Machine
                                    </option>
                                    <option value='Cape 1' {{$order->machine === 'Cape 1' ? 'selected':''}}>Cape 1
                                    </option>
                                    <option value='Cape 2' {{$order->machine === 'Cape 2' ? 'selected':''}}>Cape 2
                                    </option>
                                    <option value='Cape 5' {{$order->machine === 'Cape 5' ? 'selected':''}}>Cape 5
                                    </option>
                                </select>
                            </div>
                            @error('machine')
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

                <form method="POST" action="{{route('orders.cancelOrder', $order)}}">
                    @csrf
                    <button onclick="return confirm('Are you sure you want to cancel order {{$order->order_number}}?')"
                            class="btn btn-danger btn-lg float-right"
                            type="submit"> Disable Order
                    </button>
                </form>
            </div>
            <!-- /.card-body -->
        {{--        <div class="card-footer">--}}
        {{--            The footer of the card--}}
        {{--        </div>--}}
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </div>

@endsection
