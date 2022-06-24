@php
    $productLocations = App\Models\ProductLocation::where('product_id', App\Models\TruckDriver::getDrivingOrder(Auth::user()->machine)->pallet_id)->get();
@endphp

@foreach($productLocations as $productLocation)
    <div class="modal fade" id={{"updatePalletLocation" . $productLocation->location_id}} tabindex="-1"
         role="dialog"
         aria-labelledby="updatePalletLocationTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-olive">
                    <h5 class="modal-title" id="updatePalletLocationTitle">
                        Update Location Quantity
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"
                                  class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="was-validated" method="POST"
                          action="{{ route('productLocations.updateLocation',['order' =>$order, 'locationId'=>$productLocation->location_id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" hidden>
                            <label>Location:</label>
                            <input name="location_id"
                                   class="form-control" value="{{$productLocation->id}}" readonly>
                            @error('location_id')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Location:</label>
                            <input class="form-control" value="{{$productLocation->location->name}}" readonly>
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
                                <input type="text" class="form-control" value="{{$productLocation->Quantity}}"
                                       readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label>Space Available:</label>
                                <input type="text" class="form-control"
                                       value="{{$productLocation->location->available_storage_space - $productLocation->Quantity}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Quantity">Quantity to Add: </label>
                            <div>
                                <input type="number" min="0"
                                       max="{{$productLocation->location->available_storage_space - $productLocation->Quantity}}"
                                       class="form-control"
                                       name="Quantity"
                                       id="Quantity"
                                       placeholder="0" value="" required>
                            </div>
                            @error('Quantity')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                            <br>
                            <div class="">
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
@endforeach
