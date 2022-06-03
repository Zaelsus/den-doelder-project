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
                        <p class="">
                            <strong>Location: </strong> {{$productLocation->location->name}}
                        </p>
                    </div>

                    <form class="was-validated" method="POST" action="{{ route('orders.update',$order) }}">
                    @csrf
                    @method('PUT')

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
