<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLogService
{
    public function log(
        string $module,
        string $activity,
        ?string $description = null
    ): void {

        $user = Auth::user();

        ActivityLog::create([
            'user_id'     => $user?->id,
            'name'        => $user?->name,
            'role'        => $user->getRoleNames()->implode(', '),
            'module'      => $module,
            'activity'    => $activity,
            'description' => $description,
            'method'      => request()->method(),
            'url'         => request()->fullUrl(),
            'ip_address'  => request()->ip(),
            'user_agent'  => request()->userAgent(),
        ]);
    }

    public function logModel(
        Model $model,
        string $activity
    ): void {

        $this->log(
            class_basename($model),
            $activity,
            "{$activity} data {$model->getTable()} (ID: {$model->getKey()})"
        );
    }
}