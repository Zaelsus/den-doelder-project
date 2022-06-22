{{--    Modal for editing a Note for Admin    --}}
@php
     $notes=\App\Models\Note::orderBy('created_at', 'desc')->get();
@endphp

@foreach($notes as $note)
<div class="modal fade" id={{"editNote" . $note->id}} tabindex="-1" role="dialog"
     aria-labelledby="editNoteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-olive">
                <h5 class="modal-title" id="editNoteTitle">
                    Edit note for Order #{{$note->order->order_number}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="{{ route('notes.update',$note) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
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
                        <label class="form-check-label"><b>Labels</b></label><br>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Regular Note"
                                       {{$note->label === 'Regular Note' ? 'checked' : ''}} required>Regular Note
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Mechanical Issue"
                                       {{$note->label === 'Mechanical Issue' ? 'checked' : ''}}required>Mechanical Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Material Issue"
                                       {{$note->label === 'Material Issue' ? 'checked' : ''}} required>Material Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Technical Issue"
                                       {{$note->label === 'Technical Issue' ? 'checked' : ''}} required>Technical Issue
                            </div>
                            <br>
                        </div>
                    </div>
                    </div>
                        <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Submit</button>
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
@endforeach





{{--    Modal for editing a Note for Admin    --}}
@php
     $notes=\App\Models\Note::orderBy('created_at', 'desc')->get();
@endphp

@foreach($notes as $note)
<div class="modal fade" id={{"editNote" . $note->id}} tabindex="-1" role="dialog"
     aria-labelledby="editNoteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-olive">
                <h5 class="modal-title" id="editNoteTitle">
                    Edit note for Order #{{$note->order->order_number}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="{{ route('notes.update',$note) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
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
                        <label class="form-check-label"><b>Labels</b></label><br>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Regular Note"
                                       {{$note->label === 'Regular Note' ? 'checked' : ''}} required>Regular Note
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Mechanical Issue"
                                       {{$note->label === 'Mechanical Issue' ? 'checked' : ''}}required>Mechanical Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Material Issue"
                                       {{$note->label === 'Material Issue' ? 'checked' : ''}} required>Material Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="labelEdit" value="Technical Issue"
                                       {{$note->label === 'Technical Issue' ? 'checked' : ''}} required>Technical Issue
                            </div>
                            <br>
                        </div>
                    </div>
                    </div>
                        <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Submit</button>
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
@endforeach





