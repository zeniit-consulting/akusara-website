<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $weekStart = $now->copy()->startOfWeek();
        $weekEnd = $now->copy()->endOfWeek();

        $totalInquiries = Inquiry::count();
        $unreadInquiries = Inquiry::where('is_read', false)->count();
        $readInquiries = $totalInquiries - $unreadInquiries;
        $todayInquiries = Inquiry::whereDate('created_at', $now->toDateString())->count();
        $weeklyInquiries = Inquiry::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $recentInquiries = Inquiry::latest()->take(6)->get();

        $readRate = $totalInquiries > 0
            ? (int) round(($readInquiries / $totalInquiries) * 100)
            : 0;

        return view('admin.dashboard', compact(
            'totalInquiries',
            'unreadInquiries',
            'readInquiries',
            'todayInquiries',
            'weeklyInquiries',
            'recentInquiries',
            'readRate'
        ));
    }
}
