@extends('common.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('hourlyReports.store') }}">
                        @csrf
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Add a new hourly quality report for {{ now('Europe/Amsterdam')->format('H:i') }}
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">
                                    {{-- Here are all the form fields --}}
                                    <div class="field p-2">
                                        <div class="field">
                                            <label class="label">Pallet Name</label>
                                            <div class="control">
                                                <input name="pallet_name" class="input @error('pallet_name') is-danger @enderror"
                                                       type="text" placeholder="name of customer" value="{{old('pallet_name')}}" required>
                                            </div>
                                            @error('pallet_name')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="field">
                                            <label class="label">Order ID</label>
                                            <div class="control">
                                                <input name="order_id" class="input @error('order_id') is-danger @enderror"
                                                       type="input" placeholder="number of order here..." value="{{old('order_id')}}" required>
                                            </div>
                                            @error('order_id')
                                            <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="field p-2">
                                        <label class="label">Def #</label>
                                        <div class="control" style="width: 100%;">
                                            <select name="def_id" style="width: 30%;"
                                                    class="select is-rounded is-medium @error('def_id') is-danger @enderror"
                                                    required>
                                                <option value="">Select one</option>
                                                <option value='1. Stable Stacked Pallets' {{ old('def_id') ? 'selected' : ''}}>1. Stable Stacked Pallets</option>
                                                <option value='2. Dust, Fungi & Quality Planks' {{ old('def_id') ? 'selected' : ''}}>2. Dust, Fungi & Quality Planks</option>
                                                <option value='3. Measurement Pallet & Parts' {{ old('def_id') ? 'selected' : ''}}>3. Measurement Pallet & Parts</option>
                                                <option value='4. Position Nails' {{ old('def_id') ? 'selected' : ''}}>4. Position Nails</option>
                                                <option value='5. Corners/Stamps<' {{ old('def_id') ? 'selected' : ''}}>5. Corners/Stamps</option>
                                                <option value='6. Abnormality Material' {{ old('def_id') ? 'selected' : ''}}>6. Abnormality Material</option>
                                            </select>
                                        </div>
                                        @error('def_id')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field p-2">
                                        <label class="label">Extra Information:</label>
                                        <div class="control">
                                            <select name="extra_info" style="width: 30%;"
                                                    class="select is-rounded is-medium @error('extra_info') is-danger @enderror"
                                                    required>
                                                <option value="">Select one</option>
                                                <option value='1. No Shaky Pallets' {{ old('extra_info') ? 'selected' : ''}}>1. No Shaky Pallets</option>
                                                <option value='2. Per Pallet and Customer Dependent' {{ old('extra_info') ? 'selected' : ''}}>2. Per Pallet and Customer Dependent</option>
                                                <option value='3. Clear and Easy to Read' {{ old('extra_info') ? 'selected' : ''}}>3. Clear and Easy to Read</option>
                                                <option value='4. Length, Width & Height' {{ old('extra_info') ? 'selected' : ''}}>4. Length, Width & Height</option>
                                                <option value='5. No Protruding Nails' {{ old('extra_info') ? 'selected' : ''}}>5. No Protruding Nails</option>
                                                <option value='6. All Corners & Stamps Correct' {{ old('extra_info') ? 'selected' : ''}}>6. All Corners & Stamps Correct</option>
                                            </select>
                                        </div>
                                        @error('extra_info')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field p-2">
                                        <label class="label">Action:</label>
                                        <div class="control">
                                            <textarea name="action" placeholder="Action taken..." class="textarea @error('action') is-danger @enderror">{{ old('action') }}</textarea>
                                        </div>
                                        @error('action')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field p-2">
                                        <label class="label">Abnormalities:</label>
                                        <div class="control">
                                            <textarea name="abnormality" placeholder="Abnormalities..." class="textarea @error('abnormality') is-danger @enderror">{{ old('abnormality') }}</textarea>
                                        </div>
                                        @error('abnormality')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field is-grouped p-2">
                                        <label class="label p-2">Approved:</label>
                                        <div class="control">
                                            <label class="button p-3 ml-1 mr-1">
                                                <input type="radio" name="approved" value="1">
                                                <i class="fas fa-check fa-2x has-text-success p-2"></i>
                                            </label>
                                            <label class="button p-3 ml-1 mr-1">
                                                <input type="radio" name="approved" value="0" checked>
                                                <i class="fas fa-xmark fa-2x has-text-danger p-2"></i>
                                            </label>
                                        </div>
                                        @error('difference')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
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
                                        <a type="button" href="/hourly" class="button is-light">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
