@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Add a new hourly quality report
                    for {{ now('Europe/Amsterdam')->format('H:i') }}</h3>
                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h4><span class="badge badge-warning float-right"><i class="fa fa-exclamation-circle"
                                                                     style="font-size:20px;color:white"></i> * Required</span>
                </h4>
                <form class="was-validated" method="POST" action="{{ route('hourlyReports.store') }}">
                    @csrf
                    <div class="form-row">
                        <input name="order_id" value="{{$order->id}}" hidden>
                        <div class="col-md-6 mb-3" style="width:100%;">
                            <label class="required" for="def_id">Def #</label>
                            <div>
                                <select name="def_id" id="def_id" onchange="addExtraInfo()"
                                        class="custom-select @error('def_id') is-invalid @enderror"
                                        required>
                                    <option value="">Select one</option>
                                    <option
                                        value=1 {{ old('def_id') ? 'selected' : ''}}>
                                        1. Stable Stacked Pallets
                                    </option>
                                    <option
                                        value='2' {{ old('def_id') ? 'selected' : ''}}>
                                        2. Dust, Fungi & Quality Planks
                                    </option>
                                    <option
                                        value='3' {{ old('def_id') ? 'selected' : ''}}>
                                        3. Measurement Pallet & Parts
                                    </option>
                                    <option value='4' {{ old('def_id') ? 'selected' : ''}}>
                                        4. Position Nails
                                    </option>
                                    <option value='5' {{ old('def_id') ? 'selected' : ''}}>
                                        5. Corners/Stamps
                                    </option>
                                    <option
                                        value='6' {{ old('def_id') ? 'selected' : ''}}>
                                        6. Abnormality Material
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
                                <input name="extra_info" id="extra_info" class="form-control" readonly>
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
                                                  class="form-control @error('action') is-invalid @enderror">{{ old('action') }}</textarea>
                        </div>
                        @error('action')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="label">Abnormalities:</label>
                        <div class="control">
                                        <textarea name="abnormality" placeholder="Abnormalities..."
                                                  class="form-control @error('abnormality') is-danger @enderror">{{ old('abnormality') }}</textarea>
                        </div>
                        @error('abnormality')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="">Approved:</label>
                        <div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="approved" name="approved" class="custom-control-input"
                                       value="1">
                                <label class="custom-control-label" for="approved">
                                    <i class="fas fa-check fa-2x has-text-success p-2"></i>
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="notApproved" name="approved" class="custom-control-input"
                                       value="0" checked>
                                <label class="custom-control-label" for="notApproved">
                                    <i class="fa-solid fa-xmark has-text-danger p-2">X</i>
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
                            <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" style="width: 100%;">
                                Save
                            </button>
                        </div>
                        <br>
                        <div class="float-left">
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                            <a type="button" href="{{route('hourlyReports.list', $order)}}"
                               class="btn btn-light btn-lg">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>

        // Function to automatically populate the "Extra Info" field with set data based off the Def ID selection
        function addExtraInfo() {
            let options = document.getElementById("def_id")
            let selected = options.value;
            let extraInfo = document.getElementById("extra_info");

            if (selected == 1) {
                extraInfo.value = 'No Shaky Pallets';
            } else if (selected == 2) {
                extraInfo.value = 'Per Pallet and Customer Dependent';
            } else if (selected == 3) {
                extraInfo.value = 'Clear and Easy to Read';
            } else if (selected == 4) {
                extraInfo.value = 'Length, Width & Height';
            } else if (selected == 5) {
                extraInfo.value = 'No Protruding Nails';
            } else if (selected == 6) {
                extraInfo.value = 'All Corners & Stamps Correct';
            }
        }
    </script>
@endsection
