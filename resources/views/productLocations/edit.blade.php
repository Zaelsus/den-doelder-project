@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="card">
                        <form class="was-validated" method="POST"
                              action="{{ route('productLocations.updateLocation',['order' =>$order, 'locationId'=>$palletLocation]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 card-header">
                                <h3>Update Location Quantity</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3" hidden>
                                    <label>Location:</label>
                                    <input name="location_id"
                                           class="form-control" value="{{$palletLocation->id}}" readonly>
                                    @error('location_id')
                                    <p class="text-red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Location:</label>
                                    <input class="form-control" value="{{$palletLocation->name}}" readonly>
                                    @error('location_id')
                                    <p class="text-red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3" hidden>
                                    <label>Pallet ID:</label>
                                    <input type="text" name="product_id" class="form-control"
                                           value="{{$order->pallet_id}}" readonly>
                                    @error('product_id')
                                    <p class="text-red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="mb-3 col-md-6">
                                        <label>Total pallets available in zone:</label>
                                        <input type="text" class="form-control" value="{{$palletQuantity->Quantity}}"
                                               readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label>Space Available:</label>
                                        <input type="text" class="form-control"
                                               value="{{$palletLocation->available_storage_space - $palletQuantity->Quantity}}"
                                               readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="Quantity">Quantity to Add: </label>
                                    <div>
                                        <input type="text" class="form-control "
                                               name="Quantity"
                                               placeholder="0" value="" required>
                                    </div>
                                    @error('Quantity')
                                    <p class="text-red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                                <br>
                                <div class="float-left">
                                    <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                    <a type="button" href="{{ route('productLocations.list', $order) }}"
                                       class="btn btn-light btn-lg">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
