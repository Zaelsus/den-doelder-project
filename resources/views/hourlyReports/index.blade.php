@extends('layouts.app')

{{--@section('title', 'Welkom op mijn Portfolio')--}}

{{--@section('background', Illuminate\Support\Facades\Storage::url('img/blue_bg.jpg'))--}}

@section('content')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Hourly Check-up</p>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                        <a href="{{route('hourlyReports.create')}}" class="button is-primary">Add a new log</a>
                    </div>
                    <div class="content">
                        <table class="table is-fullwidth is-striped">
                            <thead>
                            <tr>
                                <th>Time</th>
{{--                                <th>Pallet Name</th>--}}
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
{{--                            @foreach($hourlyReports as $report)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $report->created_at->format('H:i') }}</td>--}}
{{--                                <td>{{ $report->pallet_name }}</td>--}}
{{--                                <td>{{ $report->order->order_id }}</td>--}}
{{--                                <td>{{ $report->def_id}}</td>--}}
{{--                                <td>{{ $report->extra_info }}</td>--}}
{{--                                <td>{{ $report->action === null ? 'n/a' : $report->action }}</td>--}}
{{--                                <td>{{$report->abnormality === null ? 'n/a' : $report->abnormality}}</td>--}}
{{--                                <td>--}}
{{--                                    <i class="icon fas {{ $report->approved === 1 ? 'fa-check fa-2x has-text-success' : 'fa-xmark fa-2x has-text-danger' }}"></i>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <button class="button is-primary"--}}
{{--                                            onclick=window.location.href="{{route('hourlyReports.edit', $report)}}">--}}
{{--                                        Edit--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
