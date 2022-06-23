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
                    <p><strong>Elapsed Time: {{$waitTime[$note->id]->format('%h:%I:%S')}}</strong></p>
                    <p>{{$note->content}}</p>
                </div>

            @endforeach
        @endif
    </div>
    <div id="productionTimes" class="invisibleSelection">
        @if($orderTime !== [])
            @foreach($orders as $order)
                @if($order->end_time !== null)
                    <h2><span class="badge badge-pill badge-warning">Order {{$order->order_number}}</h2>
                    <div style="padding-left: 1rem">
                        <p><strong>Elapsed Time: {{$orderTime[$order->id]->format('%h:%I:%S')}}</strong></p>
                        <p>Number of Stoppages: {{$stoppageNumber[$order->id]}}</p>
                        <p>Total Stoppages: {{$stoppageTotalTime[$order->id]->format('%h:%I:%S')}}</p>
                        {{--                        {{dd($stoppageTotalTime[$order->id]->format('%S'))}}--}}
                        <?php

                        if (((int)$stoppageTotalTime[$order->id]->format('%S')) !== 0) {


                            $seconds = (int)$stoppageTotalTime[$order->id]->format('%S') / $stoppageNumber[$order->id];
                            $minutes = 0;
                            $hours = 0;
                            if ($seconds >= 60) {
                                $minutes = $seconds / 60;
                                $seconds = $seconds - ($minutes * 60);
                                if ($minutes >= 60) {
                                    $hours = $minutes / 60;
                                    $minutes = $minutes - ($hours * 60);
                                }
                            }
                            $average = '';
                            if ($hours !== 0) {
                                $average = $hours . 'hours, ';
                            }
                            if ($minutes !== 0) {
                                $average = $average . $minutes . 'minutes, ';
                            }
                            $average = $average . $seconds . ' seconds';
                        }
                        ?>
                        @if(isset($average))
                            <p>Average Stoppage
                                Length: {{$average}}</p>
                        @else
                            <p>Average Stoppage
                                Length: 0</p>
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            <h2><span class="badge badge-pill badge-warning">No Info to Display!</span></h2>
        @endif
    </div>
    <div id="transitionTimes" class="invisibleSelection">
        @if($transitionTime === null || $transitionTime === [])
            <h2><span class="badge badge-pill badge-warning">No Transition Times to Display!</span></h2>
        @else
            @for($x = 0; $x < (sizeof($transitionOrders) - 1); $x += 1)
{{--                @if($trantitionOrders[$x]->end_time !== null)--}}
                    <h2><span
                            class="badge badge-pill badge-warning">Transition at {{$transitionOrders[$x]->end_time}} to {{$transitionOrders[$x+1]->start_time}}
                    </h2>
                    <div style="padding-left: 1rem">
                        <p><strong></strong>From <strong>Order {{$transitionOrders[$x]->order_number}}</strong> to
                            <strong>Order {{$transitionOrders[$x+1]->order_number}}</strong></p>
                        <p><strong></strong>Transition Time: {{$transitionTime[$transitionOrders[$x]->id]->format('%h:%I:%S')}}
                        </p>
                    </div>
{{--                @endif--}}
            @endfor
        @endif
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
