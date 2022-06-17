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
                        <input type="text" class="form-control is-invalid"
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
                            <div class="custom-control custom-checkbox">
                                <input onclick=isChecked() type="checkbox" class="custom-control-input" id="type_checkbox" name="order_type">
                                <label class="custom-control-label" for="type_checkbox">Check this box if this is a special order and not CP</label>
                            </div>
                            @error('type_order')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="clientName-box" style="display:none" class="col-md-6 mb-3">
                            <label class="required" for="client_name">Client Name for this order</label>
                            <div>
                            <input type="text" class="form-control is-invalid"
                                   id="clientName"
                                   name="client_name"
                                   placeholder="client name" value="{{old('client_name')}}">
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
                            <select name="pallet_id" class="custom-select @error('pallet_id') is-invalid @enderror" required>
                                <option value="">Choose a pallet</option>
                                    @foreach($pallets as $pallet)
                                        @if (old('pallet_id') == $pallet->id)
                                            <option value="{{$pallet->id}}" selected>{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>
                                        @else
                                            <option value="{{$pallet->id}}">{{$pallet->pallet_number . '. ' . $pallet->name . '. ' .$pallet->measurements}}</option>
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
                                <select name="machine_id" class="custom-select @error('machine_id') is-invalid @enderror">
                                    <option value="{{$nullMachine->id}}">Choose a machine</option>
                                    @foreach($machines as $machine)
                                        @if (old('machine_id') === $machine->id)
                                            <option value="{{$machine->id}}" selected>{{$machine->name}}</option>
                                        @else
                                            <option value="{{$machine->id}}">{{$machine->name}}</option>
                                        @endif
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
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('type_checkbox');

        const box = document.getElementById('clientName-box');
        const input = document.getElementById('clientName');

        function isChecked() {
            if (checkbox.checked) {
                box.style.display = 'block';
                checkbox.value=1;
                input.setAttribute('required', '');
            } else {
                box.style.display = 'none';
                checkbox.value=0;
                input.removeAttribute('required');
            }
        }
    </script>

@endsection


{{--<input type="string" class="form-control" id="order_number" aria-describedby="emailHelp">--}}
{{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--</div>--}}
