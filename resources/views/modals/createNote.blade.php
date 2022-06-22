{{--    Modal for creating a new (Regular) Note --}}
<div class="modal fade" id="createNote" tabindex="-1" role="dialog"
     aria-labelledby="createNoteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-olive">
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
                    <div class="row">
                        <div class="col-md-3">
                            <div>
                                <label class="form-check-label"><b>Label</b></label><br>
                            </div>
                            <select onchange="titleInfo()" name="label" id="labelCreate" class="custom-select @error('label') is-invalid @enderror" required>
                                <option value="">Choose a label</option>
                                <option value="Regular Note">Regular Note</option>
                                <option value="Mechanical Issue">Mechanical Issue</option>
                                <option value="Material Issue">Material Issue</option>
                                <option value="Technical Issue">Technical Issue</option>
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="requirednote" for="title" id="titleLabel">Title</label>
                        <i>According to label, change when needed</i>
                        <div>
                            <input class="form-control" name="title" id="title" required>
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

<script>

    function titleInfo() {
        let title = document.getElementById('title');
        let labels = document.getElementById('labelCreate');
        title.value = labels.value;
        console.log(title);
    }
</script>





