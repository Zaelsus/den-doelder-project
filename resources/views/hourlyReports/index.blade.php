@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <br>
            <div class="card">
                <div class="card-header bg-gray">
                    <h3 class="text-center">
                        Hourly Check Reports
                    </h3>
                </div>
                <div class="card-body">
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
                                <br>
                                <div class="has-text-right">
                                    <a href="{{route('hourlyReports.add', $order->id )}}"
                                       class="btn btn-info btn-lg float-left">Add a new log</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
