@extends('layouts.app')

@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
            <h2 class="card-title">{{$note->title}}</h2>
            <!-- /.card-tools -->
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <p class="heading">Created at: {{$note->created_at}}</p>
            </div>
        </div>

        <div class="card-body">
            <p>Client Name - {{$note->content}}</p>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@endsection
