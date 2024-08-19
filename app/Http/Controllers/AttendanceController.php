<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AttendanceController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];

        $user = auth()->user();

        $period = CarbonPeriod::create($request->start, $request->end);

        foreach ($period as $date) {
            $attendance = Attendance::where('user_id', $user->id)->whereDate('created_at', $date->format('Y-m-d'))->first();

            if (Carbon::now()->format('Y-m-d') >= $date->format('Y-m-d')) {
                if ($attendance) {
                    $data[] = [
                        'title' => $attendance->memo . ' - (' . Carbon::parse($attendance->created_at)->format('d/m/Y - h:i:sA') . ')',
                        'start' => $date->format('Y-m-d'),
                        'end' => $date->format('Y-m-d'),
                    ];
                } else {
                    if (! $date->isToday()) {
                        $data[] = [
                            'title' => 'Absent',
                            'start' => $date->format('Y-m-d'),
                            'end' => $date->format('Y-m-d'),
                            'color' => '#FF0000',
                        ];
                    }
                }
            }
        }

        return Response::json($data);
    }

    public function store(Request $request)
    {
        $attendance_exist = Attendance::whereDate('created_at', $request->date)->exists();
        if (! $attendance_exist && Carbon::parse($request->date)->isToday()) {
            $attendance = Attendance::create([
                'user_id' => auth()->id(),
                'memo' => $request->memo ?? 'Present',
            ]);

            $message = 'Attendance added successfully.';

            return response()->json([
                'success' => true,
                'message' => $message,
                'date' => Carbon::parse($attendance->created_at)->format('Y-m-d'),
                'memo' => $attendance->memo . ' - (' . Carbon::parse($attendance->created_at)->format('d/m/Y - h:i:sA') . ')',
            ], 200);
        }
    }

    public function records(Request $request)
    {
        $page_title = __('default.attendance_records');

        $month = $request->month ?? Carbon::now()->format('Y-m');

        $attendances = auth()->user()->attendances()->whereMonth('created_at', Carbon::parse($month)->format('m'))
            ->whereYear('created_at', Carbon::parse($month)->format('Y'))->latest()->paginate(10);

        return view('attendance_records', compact('attendances', 'page_title', 'month'));
    }
}
