@extends('layouts.app')

@if (isset($productLocation))
    @extends ('modals.updateLocation')
@endif

@extends('modals.createLocation')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <br>
            <div class="card">
                <div class="card-header bg-gray">
                    <h3 class="text-center">
                        Pallet Location Details
                    </h3>
                </div>
                <div class="card-body">
                    <div class="columns">
                        <div class="column is-full">
                            <div class="content">
                                <table class="table table-bordered table-hover table-secondary">
                                    <thead class="bg-secondary">
                                    <tr>
                                        <th scope="col">Pallet</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Quantity at location</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($productLocations !== null)
                                        {{--                                        @for($i = 0; $i < count($productLocations); $i++)--}}
                                        @foreach($productLocations as $productLocation)
                                            @php
                                                $location = App\Models\Location::where('id', $productLocation->location_id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$order->pallet->name}}</td>
                                                <td>{{$locationsQuantity['location'.'_'.$productLocation->location_id.'_'.'name']}}</td>
                                                <td>{{$locationsQuantity['location'.'_'.$productLocation->location_id.'_'.'quantity']}}
                                                    <br>
                                                    <h1 class="{{!App\Models\ProductLocation::checkAvailableSpace($productLocation->location_id) ?
                                                        'badge bg-danger' : ''}}">
                                                        {{!App\Models\ProductLocation::checkAvailableSpace($productLocation->location_id) ?
                                                        'Location Full' : ''}}</h1>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                            class="btn bg-info"
                                                            data-toggle="modal"
                                                            data-target=" {{"#updatePalletLocation" . $productLocation->location_id}}"
                                                        {{!App\Models\ProductLocation::checkAvailableSpace($productLocation->location_id) ?
                                                            'hidden' : ''}}>
                                                        Add Pallets

                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <br>
                                <div class="">
                                    @php
                                        $palletLocations = App\Models\Location::where('type', 'Pallets')->get();
                                    @endphp
                                    <button type="button"
                                            class="btn btn-lg bg-info"
                                            data-toggle="modal"
                                            data-target="#createPalletLocation">
                                        Add New Location
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
