@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Add Material to the new Order:</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('orderMaterials.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="order_id">Order Number - {{$order->order_number}}</label>
                        <div>
                            <input type="text" class="form-control is-valid @error('order_id') is-invalid @enderror"
                                   name="order_id"
                                   placeholder="Number of Order" value="{{$order->id}}">
                        </div>
                        @error('order_id')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="material_id">Order Material</label>
                        <div>
                            <select name="material_id" class="custom-select @error('material_id') is-invalid @enderror">
                                <option value="">choose a material</option>
                                @foreach($materials as $material)
                                    <option
                                        value={{$material->product_id}}>{{$material->measurements . ' ' .$material->comments}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('material_id')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_quantity">Quantity</label>
                        <div>
                            <input type="text" class="form-control is-valid @error('total_quantity') is-invalid @enderror"
                                   name="total_quantity"
                                   placeholder="Number of Order" value="{{old('total_quantity')}}">
                        </div>
                        @error('total_quantity')
                        <p class="text-red">{{ $message }}</p>
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
