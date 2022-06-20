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
                                    Quantity produced: {{$order->quantity_produced}}
                                </div>
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
                                    <div>
                                        <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" id="submitNew">Save</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                    <div class="control">
                        @if($order->quantity_produced >= $order->quantity_production)
                            <form method="POST"
                                  action="{{route('orders.stopProduction', ['order'=>$order,'machine'=>Auth::user()->machine])}}">
                                @csrf
                                <button onclick="return confirm('Is this order completed?')"
                                        class="far fa-stop-circle btn btn-danger btn-block "
                                        type="submit"> Stop Production
                                </button>
                            </form>
                        @endif

                        <a type="button" href="{{ route('orders.show', $order) }}" class="btn btn-light btn-lg">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
