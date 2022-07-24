<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $page_title = __('default.monthly_report');

        $month = $request->month ?? Carbon::now()->format('Y-m');

        $attendances = Attendance::whereMonth('created_at', Carbon::parse($month)->format('m'))
            ->whereYear('created_at', Carbon::parse($month)->format('Y'))->latest()->with('user')->paginate(10);

        return view('reports.monthly', compact('page_title', 'attendances', 'month'));
    }
}
