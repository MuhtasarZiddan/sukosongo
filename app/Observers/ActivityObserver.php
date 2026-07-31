<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Services\ActivityLogService;

class ActivityObserver
{
    public function __construct(
        protected ActivityLogService $activityLog
    ) {}

    public function created(Model $model): void
    {
        $this->activityLog->logModel($model, 'Create');
    }

    public function updated(Model $model): void
    {
        $this->activityLog->logModel($model, 'Update');
    }

    public function deleted(Model $model): void
    {
        $this->activityLog->logModel($model, 'Delete');
    }
}