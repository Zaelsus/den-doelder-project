<?php

namespace App\Http\Controllers;

use App\Models\HourlyReport;
use App\Models\Order;
use Illuminate\Http\Request;

class HourlyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hourlyReports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($orderId)
    {
        // TOFIX Need to get a parameter passed in here somehow,
        // possibly need to create a new route that redirects to here
        $hourlyReport = HourllyReport::where('order_id', $orderId);
        return view('hourlyReports.create', compact('hourlyReport', 'orderId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hourlyReport)
    {
        HourlyReport::create($this->validateHourlyReport($request));

        return redirect(route('hourlyReports.list'), ['order' => $hourlyReport->order_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function show(HourlyReport $hourlyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(HourlyReport $hourlyReport)
    {
        // TOFIX need to have the Edit blade correctly display saved data
        return view('hourlyReports.edit', compact('hourlyReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HourlyReport $hourlyReport)
    {
        $hourlyReport->update($this->validateHourlyReport($request));

        return redirect(route('hourlyReports.list', ['order' => $hourlyReport->order_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HourlyReport  $hourlyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(HourlyReport $hourlyReport)
    {
        //
    }

    /**
     * this function validates the attributes of Retro
     * @param Request $request
     * @return array
     */
    public function validateHourlyReport(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'order_id'=>'integer',
            'def_id'=>'required',
            'extra_info'=>'required',
            'action' =>'string|nullable',
            'abnormality'=> 'string|nullable',
            'approved'=>'required|boolean',
        ]);

        return $validatedAtributes;
    }

    public function list($details)
    {
        $reports = $this->getReportDetails($details);
        $order = $reports['order'];
        $orderId = $reports['orderId'];
        $hourlyReports = $reports['hourlyReports'];

        return view('hourlyReports.index', ['hourlyReports' => $hourlyReports, 'orderId' => $orderId]);
    }

    public function getReportDetails($details)
    {
        $order = Order::find($details);
        $orderId = $order->id;
        $hourlyReports = HourlyReport::where('order_id', $orderId)->get();

        return ['order' => $order, 'orderId' => $orderId, 'hourlyReports' => $hourlyReports];
    }
}
