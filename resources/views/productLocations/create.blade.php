@extends('layouts.app')

@section('header')
    Location Details
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="card">
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
                                            @foreach($locations as $location)
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
