@extends('layouts.app')

@section('content')
    <br>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-gradient-olive">
                    <h3 class="text-center">Edit note for Order #{{$note->order->order_number}}</h3>
                </div>
                <div class="card-body">
                    <form class="was-validated" method="POST" action="{{ route('notes.update',$note) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="requirednote" for="order_id">Order ID</label>
                            <div>
                                <select
                                    class="form-control @error('order_id') button-error @enderror inputField" name="order_id" id="order_id">
                                    <option value="{{$note->order->id}}">{{$note->order->order_number}}</option>
                                    @foreach($orders as $order)
                                        @if($order->id !== $note->order->id)
                                        <option value={{$order->id}}>{{$order->order_number}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="requirednote" for="title">Title</label>
                            <div>
                                <input class="form-control" name="title"
                                       type="text" value="{{$note->title}}" required>
                            </div>
                            @error('title')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="requirednote" for="content">Content</label>
                            <div>
                                <textarea type="text" class="form-control @error('content') is-invalid @enderror"
                                          name="content">{{$note->content}}</textarea>
                            </div>
                            @error('content')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="form-check-label"><b>Labels</b></label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="label" value="Error"
                                           @if($note->label === 'Error') checked @endif>
                                    <span class="form-check-label badge badge-danger" style="color: white">Error</span>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="label" value="Fix"
                                           @if($note->label === 'Fix') checked @endif>
                                    <span class="form-check-label badge badge-success" style="color: white">Fix</span>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="label" value="Other"
                                           @if($note->label === 'Other') checked @endif>
                                    <span class="form-check-label badge badge-info" style="color: white">Other</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Submit</button>
                        <br>
                        <div class="float-left">
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                            <a type="button" href="{{ route('notes.index') }}"
                               class="btn btn-light btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
