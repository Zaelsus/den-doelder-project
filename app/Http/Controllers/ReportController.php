<?php

namespace App\Http\Controllers;

use App\Models\HourlyReport;
use App\Models\Machine;
use App\Models\Note;
use App\Models\Order;
use Carbon\CarbonImmutable;
use DateInterval;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slug = 'Cape ' . $id;
        $machineHolder = Machine::where('name', $slug)->get();
        $machine = $machineHolder[0];
        $orders = Order::where('machine_id', $machine->id)->get();
        $notes = $this->findMachineNotes($machine);
        $waitTime = $this->calculateTime($notes);
        $orderTime = $this->calculateOrderTime($orders);
        $hourlyReports = $this->findHourlyReports($machine);
        $stoppageNumber = $this->findStoppageNumber($orders);
        $stoppageTotalTime = null;
        foreach($orders as $order) {
            $totalStoppageTime = $order->calculateTotalStoppageTime();
            $stoppageTotalTime[$order->id] = $totalStoppageTime;
        }
//        dd($stoppageTotalTime);
        return view('reports.show', compact(
            'machine',
            'notes',
            'waitTime',
            'hourlyReports',
            'orders',
            'orderTime',
            'stoppageNumber',
            'stoppageTotalTime',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('reports.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('reports.index');
    }

    /**
     * Sorts through the notes and finds the notes for the selected machine.
     * @param $machine
     * @return void
     */
    private function findMachineNotes($machine)
    {
        $notesAll = Note::all();
        $machineNotes = [];
        foreach ($notesAll as $note) {
            if($note->order->machine->name === $machine->name && $note->label === "Fix") {
                $machineNotes[] = $note;
            }
        }
        return $machineNotes;
    }

    /**
     * Function to calculate the time between the updated and created points for the specified deck of notes.
     * @param $notes
     * @return array
     */
    private function calculateTime($notes){
        $waitTime = [];
        foreach($notes as $note){
            $noteError = Note::find($note->note_rel);
            $time1 = new \DateTime($note->created_at);
            $time2 = new \DateTime($noteError->created_at);
            $time = $time1->diff($time2);
            $waitTime[$note->id] = $time;
        }
        return $waitTime;
    }

    /**
     * Filters the hourly reports finding those relating to orders with the specified machine
     * @param $machine
     * @return array
     */
    private function findHourlyReports($machine)
    {
        $hourlyReportsAll = HourlyReport::all();
        $machineHourlyReports = [];
        foreach ($hourlyReportsAll as $hourlyReport) {
            if($hourlyReport->order->machine->name === $machine->name) {
                $machineHourlyReports[] = $hourlyReport;
            }
        }
        return $machineHourlyReports;
    }

    /**
     * Calculates the start to end time of the order excluding stoppage times.
     * @param $orders
     * @return array
     * @throws \Exception\
     */
    private function calculateOrderTime($orders)
    {
        $orderTime = [];
        foreach($orders as $order){
            if($order->end_time !== null) {
                $time1 = new \DateTime($order->start_time);
                $time2 = new \DateTime($order->end_time);
                $time = $time1->diff($time2);
                $orderTime[$order->id] = $time;
            }
        }
        return $orderTime;
    }

    /**
     * finds the number of stoppages on a per-order basis
     * @param $orders
     * @return array
     */
    private function findStoppageNumber($orders)
    {
        $stoppages = [];
//        dd($orders);
        foreach($orders as $order)
        {
            $stoppageCounter = 0;
            $notes = $order->notes;
            foreach($notes as $note) {
                if($note->label === "Fix") {
                    $stoppageCounter += 1;
                }
            }
            $stoppages[$order->id] = $stoppageCounter;
        }
        return $stoppages;
    }

    private function calculateTotalStoppageTime($orders, $waitTimes)
    {
        $stoppageTotalTime = [];
        $interval = new \DateTime();
        $gato = new \DateTime();
        foreach($orders as $order) {
            $notes = $order->notes;
//            dd($waitTimes);
            $immutable = CarbonImmutable::now();
            $timeCollector = new DateInterval('P0S');
            foreach($notes as $note) {
                if($note->label === "Fix") {
                    $timeCollector += $waitTimes[$note->id];
                }
            }
            $stoppageTotalTime[$order->id] = $timeCollector;
        }
        dd($stoppageTotalTime);
        return $stoppageTotalTime;
    }
}
