@extends('layouts.app')

@section('header')
    Hourly Check
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                            <a href="{{route('hourlyReports.add', $order->id )}}" class="btn btn-info btn-lg float-right">Add a new log</a>
                    </div>
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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hourlyReports as $report)
                                <tr>
                                    <td>{{ $report->created_at->format('H:i') }}</td>
                                    <td>{{ $report->order->pallet->name}}</td>
                                    <td>{{ $report->order->order_number }}</td>
                                    <td>{{ $report->def_id}}</td>
                                    <td>{{ $report->extra_info }}</td>
                                    <td>{{ $report->action === null ? 'n/a' : $report->action }}</td>
                                    <td>{{$report->abnormality === null ? 'n/a' : $report->abnormality}}</td>
                                    <td>
                                        <i class="icon fas {{ $report->approved === 1 ? 'fa-check fa-2x has-text-success' : 'fa-xmark fa-2x has-text-danger' }}"></i>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-lg float-right"
                                                onclick=window.location.href="{{route('hourlyReports.edit', $report)}}">
                                            Edit
                                        </a>
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
@endsection
