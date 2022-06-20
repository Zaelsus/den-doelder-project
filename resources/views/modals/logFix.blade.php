<?php

use App\Models\Note;


?>

{{--    Modal for logging Fix --}}
<div class="modal fade" id="logFix" tabindex="-1" role="dialog"
     aria-labelledby="logFixTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logFixTitle">
                    Log the fix of stoppage for Order #{{$order->order_number}} before restarting
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="title">Title of Error Note</label>
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
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
