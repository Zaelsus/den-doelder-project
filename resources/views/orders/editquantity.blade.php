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
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Edit the pallet log {{$order->order_number . ' of customer ' . $order->client_name}}
                                </p>
                            </header>

                            <div class="card-content">
                                <div>
                                    Quantity Ordered: {{$order->quantity_production}}
                                </div>
                                <div>
                                    Quantity Produced: <input class="input" type="number" name="quantity_produced" id=" " value="{{$order->quantity_produced}}">
                                </div>
                            </div>

                            <div class="field is-grouped">
                                {{-- Here are the form buttons: save, reset and cancel --}}
                                <div class="control">
                                    <button type="submit" class="button is-primary">Save</button>

                                    <button type="reset" class="button is-warning">Reset</button>

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
