@extends('layouts.app')

@section('header')
    Location Details
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                        <a href="{{route('productLocations.addLocation', $order )}}" class="btn btn-info btn-lg float-right">
                            Add to new location
                        </a>
                    </div>
                    <div class="content">
                        <table class="table table-bordered table-hover table-secondary">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Pallet</th>
                                <th scope="col">Location</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($productLocations !== null)
                                @for($i = 0; $i < count($productLocations); $i++)
                                    <tr>
                                        <td>{{$order->pallet->name}}</td>
                                        <td>{{$locationsQuantity['location'.'_'.$productLocations[$i]->location_id.'_'.'name']}}</td>
                                        <td>{{$locationsQuantity['location'.'_'.$productLocations[$i]->location_id.'_'.'quantity']}}</td>
                                        <td>
                                            <form method="get"
                                                  action="{{ route('productLocations.editLocation', ['order' => $order, 'locationId' =>  $productLocations[$i]->location_id ]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
