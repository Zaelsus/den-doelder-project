@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Edit the order {{$order->order_number . ' of customer ' . $order->client_name}}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('orders.update',$order) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="order_number">Order Number</label>
                        <div>
                            <input type="text" class="form-control is-valid @error('order_number') is-invalid @enderror"
                                   name="order_number"
                                   placeholder="Number of Order" value="{{$order->order_number}}">
                        </div>
                        @error('order_number')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                    <h5 class="card create-order-card-titles text-center">Client and Order Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="client_name">Client Name</label>
                            <div>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                       name="client_name"
                                       placeholder="client name" value="{{$order->client_name}}">
                            </div>
                            @error('client_name')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="client_address">Client Address</label>
                            <div>
                                <input type="text" class="form-control @error('client_address') is-invalid @enderror"
                                       name="client_address"
                                       placeholder="client address" value="{{$order->client_address}}">
                            </div>
                            @error('client_address')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="pallet_id">Pallet Required</label>
                            <div>
                                <select name="pallet_id" class="custom-select @error('pallet_id') is-invalid @enderror">
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
                            <label for="quantity_production">Quantity for production</label>
                            <div>
                                <input type="number"
                                       class="form-control @error('quantity_production') is-invalid @enderror"
                                       name="quantity_production"
                                       placeholder="quantity for production" value="{{$order->quantity_production}}">
                            </div>
                            @error('quantity_production')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <h5 class="card create-order-card-titles text-center">Production Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="site_location">Site of Production</label>
                            <div>
                                <select name="site_location"
                                        class="custom-select  @error('site_location') is-invalid @enderror">
                                    <option value='Axel' {{$order->location === 'Axel' ? 'selected':''}}>
                                        Axel</option>
                                    <option value='Zelzate' {{$order->location === 'Zelzate' ? 'selected':''}}>
                                        Zelzate</option>
                                </select>
                            </div>
                            @error('site_location')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="machine">Production machine</label>
                            <div>
                                <select name="machine" class="custom-select @error('machine') is-invalid @enderror">
                                    <option value='Cape 1' {{$order->machine === 'Cape 1' ? 'selected':''}}>Cape 1</option>
                                    <option value='Cape 2' {{$order->machine === 'Cape 2' ? 'selected':''}}>Cape 2</option>
                                    <option value='Cape 5' {{$order->machine === 'Cape 5' ? 'selected':''}}>Cape 5</option>
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
                                       type="date" placeholder="date for production" value="{{$order->start_date}}">
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
                                  placeholder="Fill in if there are any additional instructions">{{$order->production_instructions}} </textarea>
                        </div>
                        @error('production_instructions')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                    <br>
                    <div class="float-left">
                    <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                    <a type="button" href="{{ route('orders.show', $order) }}" class="btn btn-light btn-lg">Cancel</a>
                    </div>
                </form>

                <form method="POST" action="{{route('orders.destroy', $order)}}">
                    @csrf
                    @method('DELETE')
                    <button  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-lg float-right" type="submit">Delete</button>
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
