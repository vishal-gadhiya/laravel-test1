<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification as SendEmailVerification;

class SendEmailVerificationNotification extends SendEmailVerification implements ShouldQueue
{
    public $delay = 5;
}
