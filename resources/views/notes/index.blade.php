@extends('layouts.app')
@section('content')
    <br>
    <div>
        <div class="card">
            <div class="card-header bg-gradient-olive">
                <h3 class="text-center">Overview Notes</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-gradient-olive opacity-70">
                    <tr>
                        <th scope="col">Order Number</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Created At</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $note)
                        <tr>
                            <td>{{ $note->order->order_number}}</td>
                            <td>{{ $note->title}}</td>
                            <td style="width: 30%">
                                <details>
                                    <summary>{{ substr($note->content, 0, 40) }}</summary>
                                    <p>{{ substr($note->content, 40) }}</p>
                                </details>
                            </td>
                            <td>{{ $note->created_at }}</td>
                            <td><button onclick=window.location.href="{{route('notes.edit', $note)}}">
                                    Edit Note
                                </button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                    <button class="btn btn-lg bg-gradient-olive opacity-70"
                        onclick=window.location.href="{{route('notes.create')}}">
                        Create Note
                    </button>
                </div>
        </div>
    </div>
@endsection
