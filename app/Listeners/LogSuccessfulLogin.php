<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Services\ActivityLogService;

class LogSuccessfulLogin
{
    public function __construct(
        protected ActivityLogService $activityLog
    ) {}

    public function handle(Login $event): void
    {
        $this->activityLog->log(
            'Authentication',
            'Login',
            'User login'
        );
    }
}