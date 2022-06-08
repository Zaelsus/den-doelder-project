@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Edit the hourly quality report
                    for {{ $hourlyReport->created_at->format('H:i') }}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('hourlyReports.update', $hourlyReport) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6 mb-3" style="width:100%;">
                            <label class="required" for="def_id">Def #</label>
                            <div>
                                <select name="def_id"
                                        class="custom-select @error('def_id') is-danger @enderror"
                                        required>
                                    <option value="">Select one</option>
                                    <option value='1' {{ $hourlyReport->def_id === '1' ? 'selected' : ''}}>1.
                                        Stable Stacked Pallets
                                    </option>
                                    <option value='2' {{ $hourlyReport->def_id === '2' ? 'selected' : ''}}>2.
                                        Dust, Fungi & Quality Planks
                                    </option>
                                    <option value='3' {{ $hourlyReport->def_id === '3' ? 'selected' : ''}}>3.
                                        Measurement Pallet & Parts
                                    </option>
                                    <option value='4' {{ $hourlyReport->def_id === '4' ? 'selected' : ''}}>4.
                                        Position Nails
                                    </option>
                                    <option value='5' {{ $hourlyReport->def_id === '5' ? 'selected' : ''}}>5.
                                        Corners/Stamps
                                    </option>
                                    <option value='6' {{ $hourlyReport->def_id === '6' ? 'selected' : ''}}>6.
                                        Abnormality Material
                                    </option>
                                </select>
                            </div>
                            @error('def_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required">Extra Information:</label>
                            <div class="control">
                                <select name="extra_info"
                                        class="custom-select @error('extra_info') is-danger @enderror"
                                        required>
                                    <option value="">Select one</option>
                                    <option
                                        value='1. No Shaky Pallets' {{ $hourlyReport->extra_info === '1. No Shaky Pallets' ? 'selected' : ''}}>
                                        1. No Shaky Pallets
                                    </option>
                                    <option
                                        value='2. Per Pallet and Customer Dependent' {{ $hourlyReport->extra_info === '2. Per Pallet and Customer Dependent' ? 'selected' : ''}}>
                                        2. Per Pallet and Customer Dependent
                                    </option>
                                    <option
                                        value='3. Clear and Easy to Read' {{ $hourlyReport->extra_info === '3. Clear and Easy to Read' ? 'selected' : ''}}>
                                        3. Clear and Easy to Read
                                    </option>
                                    <option
                                        value='4. Length, Width & Height' {{ $hourlyReport->extra_info === '4. Length, Width & Height' ? 'selected' : ''}}>
                                        4. Length, Width & Height
                                    </option>
                                    <option
                                        value='5. No Protruding Nails' {{ $hourlyReport->extra_info === '5. No Protruding Nails' ? 'selected' : ''}}>
                                        5. No Protruding Nails
                                    </option>
                                    <option
                                        value='6. All Corners & Stamps Correct' {{ $hourlyReport->extra_info === '6. All Corners & Stamps Correct'? 'selected' : ''}}>
                                        6. All Corners & Stamps Correct
                                    </option>
                                </select>
                            </div>
                            @error('extra_info')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Action:</label>
                        <div class="control">
                                        <textarea name="action" placeholder="Action taken..."
                                                  class="form-control @error('action') is-danger @enderror">{{ $hourlyReport->action }}</textarea>
                        </div>
                        @error('action')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Abnormalities:</label>
                        <div class="control">
                                        <textarea name="abnormality" placeholder="Abnormalities..."
                                                  class="form-control @error('abnormality') is-danger @enderror">{{ $hourlyReport->abnormality }}</textarea>
                        </div>
                        @error('abnormality')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="required">Approved:</label>
                        <div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="approved" name="approved" class="custom-control-input"
                                       value="1" {{ $hourlyReport->approved === 1 ? 'checked' : 'unchecked' }}>
                                <label class="custom-control-label" for="approved">
                                    <i class="fas fa-check fa-2x has-text-success p-2"></i>
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="notApproved" name="approved" class="custom-control-input"
                                       value="0" {{ $hourlyReport->approved === 0 ? 'checked' : 'unchecked' }}>
                                <label class="custom-control-label" for="notApproved">
                                    <i class="fas fa-xmark fa-2x has-text-danger p-2"></i>
                                </label>
                            </div>
                            @error('difference')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field is-grouped">
                            {{-- Here are the form buttons: save, reset and cancel --}}
                            <div class="control">
                                <button type="submit" class="btn btn-info btn-lg btn-block">Save</button>
                            </div>
                            <br>
                            <div class="float-left disabled">
                                <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                <a type="button" href="{{ url()->previous() }}" {{-- Pass in the Order ID--}}
                                class="btn btn-light btn-lg">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
