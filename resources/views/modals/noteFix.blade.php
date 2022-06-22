{{--    Modal for editing a Note for Admin    --}}
@php
    $notes=\App\Models\Note::orderBy('created_at', 'desc')->get();
@endphp

@foreach($notes as $note)
    <div class="modal fade" id={{"noteFix" . $note->id}} tabindex="-1" role="dialog"
         aria-labelledby="noteFixTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-olive">
                    <h5 class="modal-title" id="noteFixTitle">
                        Note fix for {{$note->label}}
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
                                <label for="title">Title</label>
                                <div>
                                    <input class="form-control" name="title"
                                           type="text" value="{{$note->title}}" disabled>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="content">Content</label>
                                <div>
                                <textarea class="form-control" type="text" name="content" disabled>{{$note->content}}</textarea>
                                </div>
                            </div>
                            <div>
                                <label class="requirednote" for="fixContent">Note fix</label>
                                <div>
                                    <textarea type="text" class="form-control @error('fixContent') is-invalid @enderror"
                                              name="fixContent" placeholder="please note the fix for the occurred issue" required></textarea>
                                </div>
                                @error('fixContent')
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





