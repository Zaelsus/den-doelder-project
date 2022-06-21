@extends('layouts.app')

@section('content')

    <h1 class="text-center" style="padding-top: 2rem"><span
            class="badge badge-pill badge-warning">Select a report type</span></h1>
    <select name="selection" id="selection" class="form-control @error('region') is-invalid @enderror"
            style="margin-bottom: 1rem">
        <option value="">Select a report type</option>
        <option value="errors"@if(old('selection') === 'errors') {{'selected'}}@endif>Errors</option>
        <option value="productionTimes"@if(old('selection') === 'productionTimes') {{'selected'}}@endif>Production
            Times
        </option>
        <option value="transitionTimes"@if(old('selection') === 'transitionTimes') {{'selected'}}@endif>Transition
            Times
        </option>
        <option value="hourlyReports"@if(old('selection') === 'hourlyReports') {{'selected'}}@endif>Hourly Checkups
        </option>
    </select>
    <div id="errors" class="invisibleSelection">
        @if($notes === [])
            <h2><span class="badge badge-pill badge-warning">No Errors to Display!</span></h2>
        @else
            @foreach($notes as $note)
                <h2><span class="badge badge-pill badge-warning">{{$note->title}}</h2>
                <div style="padding-left: 1rem">
                    <span @if($note->label === 'Fix') class="badge badge-success" @else class="badge badge-info" @endif
                                >{{ strtok($note->label, '(') }}</span>
                    <p><strong>Solved at: {{$note->updated_at}}</strong></p>
                    <p><strong>Elapsed time (minutes): {{$waitTime[$note->id]}}</strong></p>
                    <p>{{$note->content}}</p>
                </div>

            @endforeach
        @endif
    </div>
    <div id="productionTimes" class="invisibleSelection">
        @if($orderTime !== [])
            @foreach($orders as $order)
                <p>Elapsed Time: {{$orderTime[$order->id]}}</p>
            @endforeach
        @else
            <h2><span class="badge badge-pill badge-warning">No Info to Display!</span></h2>
        @endif
    </div>
    <div id="transitionTimes" class="invisibleSelection">
        <p>Transition Times</p>
    </div>
    <div id="hourlyReports" class="invisibleSelection">
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-full">
                        <div class="content">
                            <table class="table table-bordered table-hover table-secondary">
                                <thead class="bg-gray">
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Pallet Name</th>
                                    <th scope="col">Order #</th>
                                    <th scope="col">Def #</th>
                                    <th scope="col">Extra Info</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Abnormality</th>
                                    <th scope="col">Approved</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hourlyReports as $report)
                                    <tr>
                                        <td>{{ $report->created_at->format('H:i') }}</td>
                                        <td>{{ $report->order->pallet->name}}</td>
                                        <td>{{ $report->order->order_number }}</td>
                                        <td style="text-align:center">{{ $report->def_id}}</td>
                                        <td>{{ $report->extra_info }}</td>
                                        <td>{{ $report->action === null ? 'n/a' : $report->action }}</td>
                                        <td>{{$report->abnormality === null ? 'n/a' : $report->abnormality}}</td>
                                        <td>
                                            <i class="icon fas {{ $report->approved === 1 ? 'fa-check fa-2x has-text-success' : 'fa-xmark fa-2x has-text-danger' }}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="/js/selection.js"></script>
@endsection
