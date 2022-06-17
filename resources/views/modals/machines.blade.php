{{--Machines when user already choose a machine --}}
@php $machines=\App\Models\Machine::where('id','!=',Auth::user()->machine->id)->where('name','!=','None')->get();@endphp
@foreach($machines as $machine)
<div class="modal fade" id={{"machineChoice2" . $machine->id}} tabindex="-1" role="dialog"
     aria-labelledby={{"machineChoice2" . $machine->id . "Title"}} aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id={{"machineChoice2" . $machine->id . "Title"}}>
                    Choose Machine
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"
                                          class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Enter to machine {{$machine->name}}?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST"
                      action="{{route('machines.selectMachine', ['machine'=>$machine, 'user'=>(Auth::user())])}}">
                    @csrf
                    <button class="btn  {{$machine->id === 1 ? 'btn-success mr-10':''}}
                    {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}} float-right"
                            type="submit"> Enter Machine {{$machine->name}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{--machines when the user is just logging in--}}
@php $machines=\App\Models\Machine::all();@endphp
@foreach($machines as $machine)
<div class="modal fade" id={{"machineChoice" . $machine->id}} tabindex="-1" role="dialog"
     aria-labelledby={{"machineChoice" . $machine->id . "Title"}} aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id={{"machineChoice" . $machine->id . "Title"}}>
                    Choose Machine
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"
                                          class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="float-left"> Enter to machine {{$machine->name}}?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST"
                      action="{{route('machines.selectMachine', ['machine'=>$machine, 'user'=>(Auth::user())])}}">
                    @csrf
                    <button class="btn float-right {{$machine->id === 1 ? 'btn-success':''}}
                    {{$machine->id === 2 ? 'btn-info':''}} {{$machine->id === 3 ? 'btn-warning':''}}"
                            type="submit"> Enter Machine {{$machine->name}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    @endforeach

