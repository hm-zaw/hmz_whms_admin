<?php

namespace App\Console;

use Illuminate\Support\Facades\Schedule;

class Kernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('stocks:update-daily')->dailyAt('00:00');
    }

}
