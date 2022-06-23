
@extends('modals.createNote')
@extends('layouts.app')
@section('content')
@extends(isset($note) ? 'modals.editNote' : 'blank')
@extends('modals.noteFix')
    <!-- Button trigger modal -->

    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-olive">
                <h3 class="text-center">Overview Notes of Current Order</h3>
            </div>
            <div class="card-body">
                @if( Auth::user()->role === 'Administrator' )
                <button id="overviewButton" class="btn btn-lg bg-gradient-olive opacity-70"
                        onclick="changeButton({{$order->order_number}}, '{{ $order->machine->name }}')">
                    Notes for current machine</button>
                <br>
                <br>
                @endif
                <table class="table table-bordered table-hover" id="myTable">
                    <thead class="bg-gradient-olive opacity-70">
                    <tr>
                        <th scope="col" onclick="sortTableNumber(0)">Order</th>
                        <th scope="col">Machine</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Labels</th>
                        <th scope="col">Created At</th>
                        @if( Auth::user()->role === 'Administrator' )
                        <th scope="col">Role</th>
                        @endif
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $note)
                        @if($note->label !== 'Lunch Break' && $note->label !== 'End of Shift' && $note->label !== 'Cleaning')
                        <tr>
                            <td>
                                {{ $note->order->order_number}}
                            </td>
                            <td>
                                {{ $note->order->machine->name }}
                            </td>
                            <td style="width: 20%">
                                @if ($note->label === 'Fix')
                                Fix for: "{{ $note->title }}"
                                @else
                                {{$note->title}}
                                @endif
                            </td>
                            <td style="width: 20%">
                                <details>
                                    <summary>{{ substr($note->content, 0, 40) }}</summary>
                                    <p>{{ substr($note->content, 40) }}
                                    {{$note->fixContent !== null ? 'Fix : ' . $note->fixContent : ''}}</p>
                                </details>
                            </td>
                            <td>
                                <span class="badge badge-danger">{{$note->fix}}</span>
                                <span @if($note->label === 'Fix') class="badge badge-success" @else class="badge badge-info" @endif
                                >{{ strtok($note->label, '(') }}</span>
                            </td>
                            <td>{{ $note->created_at }}</td>
                            @if ( Auth::user()->role === 'Administrator')
                            <td>
                                {{$note->creator}}
                            </td>
                                <td>
                                    <button type="button" class="btn btn-lg bg-gradient-olive opacity-70"
                                            data-toggle="modal"
                                            data-target=" {{"#editNote" . $note->id}}"
                                            style="font-size: 12pt">
                                        Edit
                                    </button>
                                </td>
                            @elseif ( Auth::user()->role === 'Production' )
                            <td style="width: 10%">
                                @if($note->fix === 'Error!' && $note->priority === 'low')
                                    <span class="badge badge-success">fixed</span>
                                @elseif($note->fix === 'Error!' && $note->priority === 'high')
                                    <span class="badge badge-danger">log fix when restart</span>
                                @elseif($note->label === 'Mechanical Issue' || $note->label === 'Material Issue' || $note->label === 'Technical Issue')
                                    @if($note->fixContent === null)
                                    <button type="button" class="btn btn-lg bg-gradient-olive opacity-70"
                                             data-toggle="modal"
                                             data-target=" {{"#noteFix" . $note->id}}"
                                             style="font-size: 12pt">
                                        Note fix
                                    </button>
                                    @else
                                        <span class="badge badge-success">fixed</span>
                                    @endif
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-9">
                            <button type="button" class="btn btn-lg bg-gradient-olive opacity-70"
                                    data-toggle="modal"
                                    data-target="#createNote">
                                Create Note
                            </button>
                    </div>
                    <div id="buttonAllNotes" class="col-md-3">

                    </div>
                </div>
                </div>
        </div>
    </div>
    <script>
        function changeButton(order_number, machine) {
            overviewButton = document.getElementById("overviewButton")
            if (overviewButton.innerText === "Notes for current order") {
                overviewButton.innerText = "Notes for current machine";
                filterTable(order_number, 0);
            } else {
                console.log('changeButton');
                overviewButton.innerText = "Notes for current order";
                filterTable(machine, 1);
                document.getElementById("buttonAllNotes").innerHTML =
                    `<button class="btn btn-lg bg-gradient-olive opacity-70"
                onclick=window.location.href="{{route('notes.index')}}">
                    Overview all notes
                </button>`
            }
        }

        function filterTable(input, n) {
            let filter = input;
            let table = document.getElementById("myTable");
            let tr = table.getElementsByTagName("tr");
            let td;
            let txtValue;

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[n];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    console.log(txtValue);
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
