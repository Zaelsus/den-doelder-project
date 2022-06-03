@extends('layouts.app')

@section('header')
    Location Details
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
{{--                    <div class="card">--}}
{{--                        <h3>Pallet: {{$pallet->name}}</h3>--}}
{{--                        <p>--}}
{{--                            <div>--}}
{{--                                <strong>Location: </strong>--}}
{{--                                {{$productLocation->location->name}}--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <strong>Quantity: </strong> {{$productLocation->Quantity}}--}}
{{--                            </div>--}}
{{--                        </p>--}}
{{--                            <form method="get" action="{{ route('productLocations.edit', $productLocation, $pallet) }}">--}}
{{--                                @csrf--}}
{{--                                <button type="submit" class="btn btn-primary">Edit</button>--}}
{{--                            </form>--}}
{{--                    </div>--}}

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
                            <tr>
                                <td>{{$pallet->name}}</td>
                                <td>{{$productLocation->location->name}}</td>
                                <td>{{$productLocation->Quantity}}</td>
                                <td>
                                    <form method="get" action="{{ route('productLocations.edit', $orderId) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
