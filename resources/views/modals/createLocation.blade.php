<div class="modal fade" id="createPalletLocation" tabindex="-1" role="dialog"
     aria-labelledby="createPalletLocationTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="createPalletLocationTitle">
                    Update Location Quantity
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST"
                      action="{{ route('productLocations.storeLocation',['order' =>$order]) }}">
                    @csrf
                    <div class="mb-3 card-header">
                        <h3>Add to New Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Location:</label>
                            <div>
                                <select name="location_id"
                                        class="custom-select @error('location_id') is-invalid @enderror"
                                        required>
                                    @foreach($palletLocations as $location)
                                        @if(!(App\Models\ProductLocation::checkPalletExists($order->pallet_id, $location->id)))
                                            <option
                                                value={{$location->id}} {{ old('location_id') ? 'selected' : ''}}>
                                                {{$location->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3" hidden>
                            <label>Pallet ID:</label>
                            <input type="text" name="product_id" class="form-control"
                                   value="{{$order->pallet_id}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="Quantity">Quantity: </label>
                            <div>
                                <input type="number" min="0" max="1000" class="form-control"
                                       name="Quantity"
                                       placeholder="Max 1000" value="" required>
                            </div>
                            @error('Quantity')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
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

<script>
    console.log("testing the script")
</script>
