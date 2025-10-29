<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\DeletePastAppointments::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('app:delete-past')->everyMinute();
        $schedule->command('appointments:send-reminders')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
