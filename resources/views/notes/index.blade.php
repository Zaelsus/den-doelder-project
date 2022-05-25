@extends('layouts.app')

@section('header')
    Notes Overview
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <button
                    onclick=window.location.href="{{route('notes.create')}}">
                    Create Note
                </button>
                <div class="column is-full">
                    <br>
                        @foreach($notes as $note)
                        <br>
                            <details>
                                <summary>{{$note->title}} - {{$note->created_at}}</summary>
                            <p>{{$note->content}}</p>
                                <button
                                    onclick=window.location.href="{{route('notes.edit', $note)}}">
                                    Edit Note
                                </button>
                            </details>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
