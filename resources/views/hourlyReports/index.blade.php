@extends('layouts.app')

{{--@section('title', 'Welkom op mijn Portfolio')--}}

{{--@section('background', Illuminate\Support\Facades\Storage::url('img/blue_bg.jpg'))--}}

@section('header')
    Hourly Check-up
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                        <button>
                            <a href="{{route('hourlyReports.create', $orderId )}}">Add a new log</a>
                        </button>
                    </div>
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Pallet Name</th>
                                <th>Order #</th>
                                <th>Def #</th>
                                <th>Extra Info</th>
                                <th>Action</th>
                                <th>Abnormality</th>
                                <th>Approved</th>
                                <th></th>
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
                                        <button class="button is-primary"
                                                onclick=window.location.href="{{route('hourlyReports.edit', $report)}}">
                                            Edit
                                        </button>
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
