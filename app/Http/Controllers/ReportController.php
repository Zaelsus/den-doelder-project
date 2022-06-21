<?php

namespace App\Http\Controllers;

use App\Models\HourlyReport;
use App\Models\Machine;
use App\Models\Note;
use App\Models\Order;
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
        return view('reports.show', compact('machine', 'notes', 'waitTime', 'hourlyReports', 'orders', 'orderTime'));
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
            if($note->order->machine->name === $machine->name && $note->fix === "Error!") {
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
            $time = $note->created_at->diffInMinutes($note->updated_at);
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

    private function calculateOrderTime($orders)
    {
        $orderTime = [];
        foreach($orders as $order){
            if($order->end_time !== null) {
                $time = $order->start_time->diffInMinutes($order->end_time);
                $orderTime[$order->id] = $time;
            }
        }
        return $orderTime;
    }
}
