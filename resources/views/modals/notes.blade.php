{{--    Modal for creating a new (Regular) Note --}}
<div class="modal fade" id="createNote" tabindex="-1" role="dialog"
     aria-labelledby="createNoteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNoteTitle">
                    Add a new note for Order #{{$order->order_number}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="requirednote" for="title">Title</label>
                        <div>
                            <input class="form-control" name="title"
                                   type="text" placeholder="Title of note" value="{{old('title')}}" required>
                        </div>
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="requirednote" for="content">Content</label>
                        <div>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror"
                                      name="content"
                                      placeholder="Please describe the note in more detail." rows="5" required
                            >{{old('content')}}</textarea>
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
                                <input class="form-check-input" type="radio" name="label" value="Regular Note"
                                       required>Regular Note
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Mechanical Issue"
                                       required>Mechanical Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Material Issue"
                                       required>Material Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Technical Issue"
                                       required>Technical Issue
                            </div>
                            <br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Create Note</button>
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





