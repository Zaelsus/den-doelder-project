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
                        <a href="{{route('orders.create')}}" class="btn btn-info btn-lg btn-block">Add a new location</a>
                    </div>
                    <div class="card">
                        <h3>Pallet: {{$pallet->name}}</h3>
                        <p>
                            <div>
                                <strong>Location: </strong>
                                {{$productLocation->location->name}}
                            </div>
                            <div>
                                <strong>Quantity: </strong> {{$productLocation->Quantity}}
                            </div>
                        </p>
                            <form method="get" action="{{ route('productLocations.edit', $productLocation, $pallet) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                    </div>
{{--                    <table class="table table-bordered table-hover table-secondary">--}}
{{--                        <thead class="thead-dark">--}}
{{--                            <tr>--}}
{{--                                <th scope="col">Type</th>--}}
{{--                                <th scope="col">Location</th>--}}
{{--                                <th scope="col">Quantity</th>--}}
{{--                                <th scope="col">Actions</th>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>{{ucfirst($order->pallet->product->type)}}</td>--}}
{{--                                <td></td>--}}
{{--                            </tr>--}}
{{--                            @foreach($order->orderMaterials as $orderMaterial)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$orderMaterial->material->product->type}}</td>--}}
{{--    --}}{{--                                <td>{{$orderMaterial->material->location->name}}</td>--}}
{{--                                    <td></td>--}}
{{--                                    <td></td>--}}
{{--                                    <td>--}}
{{--                                        <a href="#" class="btn btn-info btn-sm">Edit</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
