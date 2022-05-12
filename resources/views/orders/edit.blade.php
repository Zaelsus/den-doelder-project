@extends('common.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('orders.update',$order) }}">
                        @csrf
                        @method('PUT')
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Edit the order {{$order->order_id . ' of customer ' . $order->customer_name}}
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">

                                    {{-- Here are all the form fields --}}
                                    <div class="field">
                                        <label class="label">Order ID</label>
                                        <div class="control">
                                            <input name="order_id" class="input @error('order_id') is-danger @enderror"
                                                   type="text" value="{{$order->order_id}}">
                                        </div>
                                        @error('order_id')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Customer Name</label>
                                        <div class="control">
                                            <input name="customer_name" class="input @error('customer_name') is-danger @enderror"
                                                   type="text" value="{{$order->customer_name}}">
                                        </div>
                                        @error('customer_name')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">Location of production</label>
                                        <div class="control">
                                            <select name="location" class="textarea @error('location') is-danger @enderror">
                                                <option value='Axel' {{$order->location === 'Axel' ? 'selected':''}}>
                                                    Axel</option>
                                                <option value='Zelzate' {{$order->location === 'Zelzate' ? 'selected':''}}>
                                                    Zelzate</option>
                                            </select>
                                        </div>
                                        @error('location')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">Production Line:</label>
                                        <div class="control">
                                            <select name="order_production_line" class="textarea @error('order_production_line') is-danger @enderror">
                                                <option value=1 {{$order->order_production_line === 1 ? 'selected':''}}>
                                                    CAPE 1</option>
                                                <option value=2 {{$order->order_production_line === 2 ? 'selected':''}}>
                                                    CAPE 2</option>
                                                <option value=5 {{$order->order_production_line === 5 ? 'selected':''}}>
                                                    CAPE 5</option>
                                            </select>
                                        </div>
                                        @error('order_production_line')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">Schedule Production Date</label>
                                        <div class="control">
                                            <input name="scheduled_production_date" class="input @error('scheduled_production_date') is-danger @enderror"
                                                   type="text" placeholder="date and time" value="{{$order->scheduled_production_date}}">
                                        </div>
                                        @error('scheduled_production_date')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <h2>Materials and Instructions</h2>
                                        <div class="field">
                                            <label class="label">Pallet Type</label>
                                            <div class="control">
                                                <select name="pallet_type" class="textarea @error('pallet_type') is-danger @enderror">
                                                    <option value='Wet Pallet' {{$order->pallet_type === 'Wet Pallet' ? 'selected':''}}>
                                                        Wet Pallet</option>
                                                    <option value='Dry Pallet' {{$order->pallet_type === 'Dry Pallet' ? 'selected':''}}>
                                                        Dry Pallet</option>
                                                </select>
                                            </div>
                                            @error('pallet_type')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="field">
                                            <label class="label">Number of pallets</label>
                                            <div class="control">
                                                <input name="quantity" class="input @error('quantity') is-danger @enderror"
                                                       type="text" placeholder="quantity" value="{{$order->quantity}}">
                                            </div>
                                            @error('quantity')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="field">
                                            <label class="label">Material</label>
                                            <div class="control">
                                                <select name="material" class="textarea @error('material') is-danger @enderror">
                                                    <option value='HT/KD 1000x100x22 BC (1000x100x22)' {{$order->material === 'HT/KD 1000x100x22 BC (1000x100x22)' ? 'selected':''}}>
                                                        HT/KD 1000x100x22 BC (1000x100x22)</option>
                                                    <option value='HT/KD 1200x100x22 BC (1200x100x22)' {{$order->material === 'HT/KD 1200x100x22 BC (1200x100x22)' ? 'selected':''}}>
                                                        HT/KD 1200x100x22 BC (1200x100x22)</option>
                                                    <option value='Spaan 95x95x78 (95x95x78)' {{$order->material === 'Spaan 95x95x78 (95x95x78)' ? 'selected':''}}>
                                                        Spaan 95x95x78 (95x95x78)</option>
                                                </select>
                                            </div>
                                            @error('material')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="field">
                                            <label class="label">Amount of Material</label>
                                            <div class="control">
                                                <input name="material_quantity" class="input @error('material_quantity') is-danger @enderror"
                                                       type="text" value="{{$order->quantity}}">
                                            </div>
                                            @error('material_quantity')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="field">
                                            <label class="label">Instructions</label>
                                            <div class="control">
                                            <textarea name="instructions" class="input @error('instructions') is-danger @enderror"
                                                      type="text">{{$order->order_id}} </textarea>
                                            </div>
                                            @error('instructions')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-grouped">
                                    {{-- Here are the form buttons: save, reset and cancel --}}
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Save</button>
                                    </div>
                                    <div class="control">
                                        <button type="reset" class="button is-warning">Reset</button>
                                    </div>
                                    <div class="control">
                                        <a type="button" href="{{ route('orders.show', $order) }}" class="button is-light">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
<br>
                    <form method="POST" action="{{route('orders.destroy', $order)}}">
                        @csrf
                        @method('DELETE')
                        <button  onclick="return confirm('Are you sure?')" class="button is-primary" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
