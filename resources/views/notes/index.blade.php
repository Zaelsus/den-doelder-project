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
                                    <p>{{ substr($note->content, 40) }}</p>
                                </details>
                            </td>
                            <td>
                                <span @if ($note->label==='Error')
                                      class="badge badge-danger"
                                      @elseif ($note->label==='Fix')
                                      class="badge badge-success"
                                      @else
                                      class="badge badge-info"
                                @endif >{{$note->label}}</span>
                            </td>
                            <td>
                                <span  @if ($note->priority==='low')
                                       class="badge bg-yellow"
                                       @elseif ($note->priority==='medium')
                                       class="badge bg-orange"
                                       @else
                                       class="badge bg-red"
                                @endif >{{ $note->priority }}
                                </span>
                            </td>
                            <td>{{ $note->created_at }}</td>
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
        function sortTableNumber(n) {
            console.log("table is sorting");
            let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc";
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir === "asc") {
                        if ((Number(x.innerHTML) > Number(y.innerHTML))) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        }
                    } else {
                        if ((Number(x.innerHTML) < Number(y.innerHTML))) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if(switchcount === 0 && dir === "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

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
