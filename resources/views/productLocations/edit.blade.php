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
                    <form class="was-validated" method="POST" action="{{ route('productLocations.update',$orderId) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 card-header">
                            <h3>Change Location</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Current Location:</label>
                                <div>{{$productLocation->location->name}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="name">New Location: </label>
                                <div>
                                    <input type="text" class="form-control "
                                           name="name"
                                           placeholder="{{$productLocation->location->name}}"  value="" required>
                                </div>

                                @error('name')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Quantity">Quantity: </label>
                                <div>
                                    <input type="text" class="form-control "
                                           name="Quantity"
                                           placeholder="{{$productLocation->Quantity}}"  value="" required>
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
                                <a type="button" href="{{ route('productLocations.show', $orderId) }}" class="btn btn-light btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
