@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-olive">
                <h3 class="text-center">Log the fix to pausing Order #{{$order->order_number}}</h3>
            </div>
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="title">Title of Note</label>
                            <div>
                                <input class="form-control" type="text" name="title" value="{{$note->title}}">
                            </div>
                            @error('title')
                            <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="requirednote" for="fix">Fix</label>
                        <div>
                            <textarea type="text" class="form-control @error('fix') is-invalid @enderror"
                                      name="content"
                                      placeholder="Please describe the fix for the error occurred." rows="5" required
                            >{{old('content')}}</textarea>
                        </div>
                        @error('fix')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
{{--                    <div>--}}
{{--                        <input class="form-control" type="text" name="title" value="{{$note->title}}" style="display:none"--}}
{{--                               >--}}
{{--                    </div>--}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="label" value="Fix" style="display:none"
                               checked>
                    </div>
                    <div>
                        <input type="text" name="note_rel" value="{{$note->id}}" style="display:none">
                    </div>

                    <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Log fix for stoppage</button>
                </form>
            </div>
        </div>
    </div>
@endsection


