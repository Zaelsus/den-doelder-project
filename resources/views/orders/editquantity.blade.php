@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('orders.updatequantity',$order) }}">
                        @csrf
                        @method('PUT')
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header bg-secondary">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Edit the pallet log {{$order->order_number . ' of customer ' . $order->client_name}}
                                </p>
                            </header>

                            <div class="card-content table table-bordered table-hover table-light ">
                                <div>
                                    Quantity to be produced: {{$order->toproduce}}
                                </div>
                                <div>
                                    Log Quantity: <input class="input" type="number" name="add_quantity" id=" " value="{{$order->add_quantity}}">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="field is-grouped">
                                {{-- Here are the form buttons: save, reset and cancel --}}
                                <div class="control">
                                    <button type="submit" class="button is-primary">Save</button>

                                    <a type="button" href="{{ route('orders.show', $order) }}" class="button is-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
