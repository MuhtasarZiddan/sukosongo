<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use App\Services\ActivityLogService;

class LogSuccessfulLogout
{
    public function __construct(
        protected ActivityLogService $activityLog
    ) {}

    public function handle(Logout $event): void
    {
        $this->activityLog->log(
            'Authentication',
            'Logout',
            'User logout'
        );
    }
}