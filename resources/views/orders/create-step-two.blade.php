@extends('layouts.app')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class=" text-center ">Add Material to the new Order {{$order->order_number}}:</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="alert alert-default-info alert-dismissible fade show">
                    How many of which materials are needed for 1 pallet of type {{$order->pallet->name}}
                    Please choose between 0-13.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('orders.create.step.two.post') }}">
                    @csrf
                    <h5 class="card create-order-card-titles text-center">Already set for the chosen pallet</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" >Material</th>
                            <th scope="col">Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($palletMaterials as $key=>$existMaterials)
                            <tr>
                                <td width="200">
                                    {{$existMaterials->material_id.' '.$existMaterials->material->measurements}}
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="existMaterial[{{ $key}}][order_id]"
                                           value="{{$order->id}}">
                                    <input type="hidden" class="form-control" name="existMaterial[{{ $key}}][material_id]"
                                           value="{{$existMaterials->material_id}}">
                                    <input type="number" min="0" max="13" class="form-control"
                                           name="existMaterial[{{ $key}}][total_quantity]" value="{{$existMaterials->total_quantity}}">

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-info btn-lg btn-lg btn-block">Submit</button>
                    <br>

                    <h5 class="card create-order-card-titles text-center">Add new materials</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Material</th>
                            <th scope="col">Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materials as $key=>$products)
                            <tr>
                                <td width="200">
                                    {{$products->product_id.' '.$products->measurements}}
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="product[{{ $key}}][order_id]"
                                           value="{{$order->id}}">
                                    <input type="hidden" class="form-control" name="product[{{ $key}}][material_id]"
                                           value="{{$products->product_id}}">
                                    <input size="2" type="number" min="0" max="13" class="form-control"
                                           name="product[{{ $key}}][total_quantity]" value="0">

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-info btn-lg btn-lg btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
