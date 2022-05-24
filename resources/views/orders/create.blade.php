@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
    <div class="card create-order-card">
        <div class="card-header bg-gradient-info">
            <h3 class="  text-center ">New Order Form:</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->

            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="form-group">
                    <label for="order_number">Order Number</label>
                    <input type="text" class="form-control input @error('order_number') is-danger @enderror" id="order_number"
                           placeholder="Number of Order" value="{{old('order_number')}}">
                    @error('order_number')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <h5 class="card create-order-card-titles text-center">Client and Order Details</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control input @error('client_name') is-danger @enderror" id="client_name"
                               placeholder="client name" value="{{old('client_name')}}">
                        @error('client_name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="client_address">Client Address</label>
                        <input type="text" class="form-control input @error('client_address') is-danger @enderror" id="client_address"
                               placeholder="client address" value="{{old('client_address')}}">
                        @error('client_address')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="pallet_id">Pallet Required</label>
                        <select name="pallet_id" class="custom-select @error('pallet_id') is-danger @enderror">
                            <option value="">choose a pallet</option>
                            {{--                        @foreach($pallets as $pallet)--}}
                            {{--                            <option value='{{$pallet->id}}'>{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>--}}
                            {{--                        @endforeach--}}
                        </select>
                        @error('pallet_id')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="quantity_production">Quantity for production</label>
                        <input type="number" class="form-control input @error('quantity_production') is-danger @enderror" id="quantity_production"
                               placeholder="quantity for production" value="{{old('quantity_production')}}">
                        @error('quantity_production')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <h5 class="card create-order-card-titles text-center">Production Details</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="site_location">Site of Production</label>
                        <select name="site_location" class="custom-select  @error('site_location') is-danger @enderror">
                            <option value="">choose a site</option>
                            <option value='Cape 1'>Axel</option>
                            <option value='Cape 2'>Zelzete</option>
                        </select>
                        @error('site_location')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="machine">Production machine</label>
                        <div>
                        <select name="machine" class="custom-select @error('machine') is-danger @enderror">
                            <option value="">choose a production machine</option>
                            <option value='Cape 1'>Cape 1</option>
                            <option value='Cape 2'>Cape 2</option>
                            <option value='Cape 5'>Cape 5</option>
                        </select>
                        </div>
                        @error('machine')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="start_date">Schedule Production Date</label>
                        <div class="control">
                            <input name="start_date" class="form-control @error('start_date') is-danger @enderror"
                                   type="date" placeholder="date for production" value="{{old('start_date')}}">
                        </div>
                        @error('start_date')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="production_instructions">Additional Production Instructions</label>
                    <textarea name="production_instructions" class="form-control @error('production_instructions') is-danger @enderror"
                              type="text" placeholder="Fill in if there are any additional instructions">{{old('order_id')}} </textarea>
                    @error('production_instructions')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-info btn-lg btn-lg btn-block">Submit</button>

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


{{--<input type="string" class="form-control" id="order_number" aria-describedby="emailHelp">--}}
{{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--</div>--}}
