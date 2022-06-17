@extends('layouts.app')

@section('content')

    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class=" text-center ">Change material to order {{$order->order_number}}:</h3>
                <div class="card-tools">
                </div>
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
                <form method="POST" action="{{ route('orders.update.step.two.post',$order) }}">
                    @csrf
                    @method('PUT')
                    <table>
                        <thead>
                        <tr>
                            <th>Material</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($materials as $key=>$products)
                            <?php
                            $oMaterials = $order->orderMaterials;
                            $max=count($oMaterials);
                            $check = false;
                            $i = 0;
                            while (!$check && $i < $max) {
                                if ($products->product_id === $oMaterials[$i]->material_id) {
                                    $check = true;
                                    $orderMaterial = $oMaterials[$i];
                                } else {
                                    $check = false;
                                }
                                $i++;
                            }
                            ?>
                            <tr>
                                <td>
                                    {{$products->product_id}} {{$products->measurements . ' ' .$products->comments}}
                                </td>
                                <td>
                                    <input type="hidden" class="form-control" name="product[{{ $key}}][order_id]"
                                           value="{{$order->id}}">
                                    <input type="hidden" class="form-control" name="product[{{ $key}}][material_id]"
                                           value="{{$products->product_id}}">

                                    @if($check)
                                        <input type="number" min="0" max="13" class="form-control"
                                               name="product[{{ $key}}][total_quantity]"
                                               value="{{round((($orderMaterial->total_quantity)/$order->quantity_production),0)}}">
                                    @else
                                        <input type="number" min="0" max="13" class="form-control"
                                               name="product[{{ $key}}][total_quantity]" value="0">
                                    @endif
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
