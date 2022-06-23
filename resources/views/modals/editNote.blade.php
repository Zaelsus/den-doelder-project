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
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <label class="form-check-label"><b>Label</b></label><br>
                            </div>
                            <select name="label" id="labelEdit" class="custom-select @error('label') is-invalid @enderror" required>
                                <option value="" >Choose a label</option>
                                <option value="Regular Note"
                                    {{$note->label === 'Regular Note' ? 'selected':''}}>
                                    Regular Note</option>
                                <option value="Mechanical Issue"
                                    {{$note->label === 'Mechanical Issue' || $note->label === 'Mechanical Issue (Error)' ? 'selected':''}}>
                                    Mechanical Issue</option>
                                <option value="Material Issue"
                                    {{$note->label === 'Material Issue' || $note->label === 'Material Issue (Error)' ? 'selected':''}}>
                                    Material Issue</option>
                                <option value="Technical Issue"
                                    {{$note->label === 'Technical Issue' || $note->label === 'Technical Issue (Error)' ? 'selected':''}}>
                                    Technical Issue</option>
                            </select>
                            <br>
                        </div>
                    </div>
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





