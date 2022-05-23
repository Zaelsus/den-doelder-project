@extends('layouts.app')

@section('header')
    Notes Overview
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                        <tr>
                            <th>Order number</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notes as $note)
                            <details>
                                <summary>{{$note->title}}</summary>
                            </details>
                            <tr>
                                <td>{{$note->order->order_number}}</td>
                                <td>{{$note->created_at}}</td>
                                <td>{{$note->title}}</td>
                                <td><a href="{{ route('notes.show', $note) }}">Show</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
