@extends('layouts.app')

@section('content')

    <h1 class="text-center" style="padding-top: 2rem"><span class="badge badge-pill badge-warning">Select a report type</span></h1>
    <select name="selection" id="selection" class="form-control @error('region') is-invalid @enderror">
        <option value="">Select a report type</option>
        <option value="errors"@if(old('selection') === 'errors') {{'selected'}}@endif>Errors</option>
        <option value="productionTimes"@if(old('selection') === 'productionTimes') {{'selected'}}@endif>Production Times</option>
        <option value="transitionTimes"@if(old('selection') === 'transitionTimes') {{'selected'}}@endif>Transition Times</option>
        <option value="hourlyReports"@if(old('selection') === 'hourlyReports') {{'selected'}}@endif>Hourly Checkups</option>
    </select>
    <div id="errors" class="invisibleSelection">
        <p>Errors</p>
        <h2>{{$machine}}</h2>
    </div>
    <div id="productionTimes" class="invisibleSelection">
        <p>Production Times</p>
    </div>
    <div id="transitionTimes" class="invisibleSelection">
        <p>Transition Times</p>
    </div>
    <div id="hourlyReports" class="invisibleSelection">
        <p>Hourly Reports</p>
    </div>

    <script src="/js/selection.js"></script>
@endsection
