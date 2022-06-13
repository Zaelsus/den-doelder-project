@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Add Material to the new Order {{$order->order_number}}:</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('orders.create.step.two.post') }}">
                    @csrf
                    <table>
                        <thead>
                        <tr>
                        <th>Material</th>
                        <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materials as $key=>$products)
                            <tr>
                            <td>
                               {{$products->product_id}} {{$products->measurements . ' ' .$products->comments}}
                            </td>
                            <td>
                                <input type="hidden" class="form-control" name="product[{{ $key}}][order_id]" value="{{$order->id}}">
                                <input type="hidden" class="form-control" name="product[{{ $key}}][material_id]" value="{{$products->product_id}}">
                                <input type="number" min="0" max="13" class="form-control" name="product[{{ $key}}][total_quantity]" value="0" >
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
