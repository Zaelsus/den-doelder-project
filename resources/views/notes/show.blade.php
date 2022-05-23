@extends('layouts.app')

@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <h4>{{$note->title}}</h4>
            <div class="card-tools">
                <p class="heading">Created at: {{$note->created_at}}</p>
            </div>
        </div>

        <div class="card-body">
            <p>{{$note->content}}</p>
        </div>

        <div>
            <button
                    onclick=window.location.href="{{route('notes.edit', $note)}}">
                Edit Note
            </button>
        </div>

    </div>
@endsection
