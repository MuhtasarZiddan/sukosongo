<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::query()

            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            })

            ->when($request->role, fn($q, $role) => $q->where('role', $role))

            ->when($request->module, fn($q, $module) => $q->where('module', $module))

            ->when($request->activity, fn($q, $activity) => $q->where('activity', $activity))

            ->latest()

            ->paginate(15)

            ->withQueryString();

        return view('activity-logs.index', [
            'logs' => $logs,

            'roles' => ActivityLog::query()
                ->whereNotNull('role')
                ->distinct()
                ->orderBy('role')
                ->pluck('role'),

            'modules' => ActivityLog::query()
                ->distinct()
                ->orderBy('module')
                ->pluck('module'),

            'statistics' => [
                'total' => ActivityLog::count(),
                'today' => ActivityLog::whereDate('created_at', today())->count(),
                'login' => ActivityLog::where('activity', 'Login')->count(),
                'crud' => ActivityLog::whereIn('activity', [
                    'Create',
                    'Update',
                    'Delete'
                ])->count(),
            ],
        ]);
    }
}