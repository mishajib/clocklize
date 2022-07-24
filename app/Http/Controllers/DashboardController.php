<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $page_title = __('default.dashboard');

        $attendances = Attendance::latest()->with('user')->paginate(10);
        $page        = view('dashboard', compact('page_title', 'attendances'));

        if (auth()->user()->hasRole('member')) {
            $page = view('member_dashboard', compact('page_title'));
        }

        return $page;
    }
}
