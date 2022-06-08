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
               <h4> <span class="badge badge-warning float-right"><i class="fa fa-exclamation-circle" style="font-size:20px;color:white"></i> * Required</span>  </h4>
                <form class="was-validated" method="POST" action="{{ route('orders.create.step.one.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="required" for="order_number">Order Number</label>
                        <div>
                        <input type="text" class="form-control is-invalid "
                               name="order_number"
                               placeholder="Number of Order e.g Order-4891" value="{{old('order_number')}}" required>
                        </div>

                            @error('order_number')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                    <h5 class="card create-order-card-titles text-center">Client and Order Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="client_name">Client Name</label>
                            <div>
                            <input type="text" class="form-control is-invalid"
                                   name="client_name"
                                   placeholder="client name" value="{{old('client_name')}}"
                            required>
                            </div>
                                @error('client_name')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required" for="client_address">Client Address</label>
                            <div>
                            <input type="text" class="form-control is-invalid @error('client_address') is-invalid @enderror"
                                   name="client_address"
                                   placeholder="client address" value="{{old('client_address')}}" required>
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
                            <select name="pallet_id" class="custom-select @error('pallet_id') is-invalid @enderror" required>
                                <option value="">Choose a pallet</option>
                                    @foreach($pallets as $pallet)
                                        @if (old('pallet_id') == $pallet->id)
                                            <option value="{{ $pallet->id }}" selected>{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>
                                        @else
                                            <option value="{{ $pallet->id }}">{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>
                                        @endif
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
                                   placeholder="quantity for production e.g 100" value="{{old('quantity_production')}}" required>
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
                                    <input type="radio" id="customRadioInline1" name="site_location" class="custom-control-input" value="Axel" {{ old('site_location')==="Axel" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="customRadioInline1">Axel</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="site_location" class="custom-control-input" value="Zelzate" {{ old('site_location')==="Zelzate" ? 'checked='.'"'.'checked'.'"' : '' }}required>
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
                                    <option value="">Choose a production machine</option>
                                    <option value='Cape 1'@if(old('machine') === 'Cape 1') {{'selected'}}@endif>Cape 1</option>
                                    <option value='Cape 2'@if(old('machine') === 'Cape 2') {{'selected'}}@endif>Cape 2</option>
                                    <option value='Cape 5'@if(old('machine') === 'Cape 5') {{'selected'}}@endif>Cape 5</option>
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
                                       type="date" placeholder="Date for production" value="{{old('start_date')}}">
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
                                  placeholder="Fill in if there are any additional instructions">{{old('production_instructions')}} </textarea>
                       </div>
                           @error('production_instructions')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btn-lg btn-lg btn-block">Create Order</button>
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
