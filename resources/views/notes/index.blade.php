@extends('layouts.app')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-gradient-olive">
                <h3 class="text-center">Overview Notes</h3>
            </div>
            <div class="card-body">
                <button id="overviewButton" class="btn btn-lg bg-gradient-olive opacity-70"
                        onclick="changeButton({{$order->order_number}}, '{{ $order->machine }}')">
                    Notes for current machine</button>
                <br>
                <br>
                <table class="table table-bordered table-hover" id="myTable">
                    <thead class="bg-gradient-olive opacity-70">
                    <tr>
                        <th scope="col" onclick="sortTableNumber(0)">Order Number</th>
                        <th scope="col">Machine</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Labels</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Created At</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $note)
                        <tr>
                            <td>
                                {{ $note->order->order_number}}
                            </td>
                            <td>
                                {{ $note->order->machine }}
                            </td>
                            <td style="width: 20%">{{ $note->title}}</td>
                            <td style="width: 30%">
                                <details>
                                    <summary>{{ substr($note->content, 0, 40) }}</summary>
                                    <p>{{ substr($note->content, 40) }} <b>Fix: </b>{{ $note->fix }}</p>
                                </details>
                            </td>
                            <td>
                                <span @if ($note->label==='Error')
                                      class="badge badge-danger"
                                      @elseif ($note->label==='Fix')
                                      class="badge badge-success"
                                      @elseif ($note->label === 'Other')
                                      class="badge badge-info"
                                      @elseif ($note->label === 'stoppage')
                                      class="badge badge-danger"
                                @endif >{{$note->label}}</span>
                            </td>
                            <td>
                                <span  @if ($note->priority==='low')
                                       class="badge bg-yellow"
                                       @elseif ($note->priority==='medium')
                                       class="badge bg-orange"
                                       @elseif ($note->priority === 'high')
                                       class="badge bg-red"
                                @endif >{{ $note->priority }}
                                </span>
                            </td>
                            <td>{{ $note->created_at }}</td>
                            <td @if ($note->label === 'stoppage') style="width: 10%" @endif>
                                @if ($note->label === 'stoppage')
                                    <button class="btn btn-lg bg-gradient-olive opacity-70" onclick=window.location.href="{{ route('notes.fixStoppage', $note)}}">Log fix</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <button class="btn btn-lg bg-gradient-olive opacity-70"
                                onclick=window.location.href="{{route('notes.create')}}">
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
