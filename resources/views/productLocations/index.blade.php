@extends('layouts.app')

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
                                        @for($i = 0; $i < count($productLocations); $i++)
                                            <tr>
                                                <td>{{$order->pallet->name}}</td>
                                                <td>{{$locationsQuantity['location'.'_'.$productLocations[$i]->location_id.'_'.'name']}}</td>
                                                <td>{{$locationsQuantity['location'.'_'.$productLocations[$i]->location_id.'_'.'quantity']}}
                                                    <br>
                                                    <h1 class="{{!App\Models\ProductLocation::checkAvailableSpace($productLocations[$i]->location_id) ?
                                                        'badge bg-danger' : ''}}">
                                                        {{!App\Models\ProductLocation::checkAvailableSpace($productLocations[$i]->location_id) ?
                                                        'Location Full' : ''}}</h1>
                                                </td>
                                                <td>
                                                    <form method="GET"
                                                          action="{{route('productLocations.editLocation', ['order' => $order, 'locationId' => $productLocations[$i]->location_id])}}"
                                                        {{!App\Models\ProductLocation::checkAvailableSpace($productLocations[$i]->location_id) ?
                                                          'hidden' : ''}}>
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary float-left">Add
                                                        </button>
                                                    </form>

                                                    {{--                                                    <form method="get"--}}
                                                    {{--                                                          action="{{ route('productLocations.editLocation', ['order' => $order, 'locationId' =>  $productLocations[$i]->location_id]) }}">--}}
                                                    {{--                                                        @csrf--}}
                                                    {{--                                                        <button type="submit" class="btn btn-warning float-left">Take</button>--}}
                                                    {{--                                                    </form>--}}
                                                </td>
                                            </tr>
                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                                <br>
                                <div class="">
                                    <a href="{{route('productLocations.addLocation', $order )}}"
                                       class="btn btn-info btn-lg float-left">
                                        Add to new location
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
