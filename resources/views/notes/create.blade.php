@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-olive">
                <h3 class="text-center">Add a new note for Order #{{$order->order_number}}</h3>
            </div>
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="requirednote" for="title">Title</label>
                        <div>
                            <input class="form-control is-invalid" name="title"
                                   type="text" placeholder="Title of note" value="{{old('title')}}" required>
                        </div>
                        @error('title')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="requirednote" for="content">Content</label>
                        <div>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror"
                                      name="content"
                                      placeholder="Content of note" rows="5" required
                            >{{old('content')}}</textarea>
                        </div>
                        @error('content')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="requirednote" for="labels">Labels</label><br>
                        <i>Please select the label applicable</i>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Error"
                                       onclick="myFunction()">
                                <span class="form-check-label badge badge-danger" style="color: white">Error</span>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Fix"
                                       onclick="myFunction()">
                                <span class="form-check-label badge badge-success" style="color: white">Fix</span>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Other"
                                       onclick="myFunction()">
                                <span class="form-check-label badge badge-info" style="color: white">Other</span>
                            </div>
                        </div>

                        <div class="col-md-4" id="text" style="display:none">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="low">Low priority
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="medium">Medium priority
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="high">High priority
                            </div>
                        </div>
                    </div>
                    <br>

                    <script>
                        function myFunction() {
                            console.log("function");
                            let labelElements = Array.from(document.getElementsByName("label"));
                            let text = document.getElementById("text");
                            let i = 0;
                            let checked = false;
                            while (i < labelElements.length && checked === false) {
                                if (labelElements[i].checked === true) {
                                    text.style.display = "block";
                                    checked = true;
                                } else {
                                    text.style.display = "none";
                                }
                                i++;
                            }
                        }
                    </script>
                    <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Create Note</button>
                </form>
            </div>
        </div>
    </div>
@endsection

