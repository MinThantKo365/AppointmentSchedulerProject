<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Appointments;
use Illuminate\Console\Command;

class DeletePastAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-past';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete appointments whose time has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $deleted = Appointments::where(function ($query) use ($now) {
            $query->where('appointment_date', '<', $now->toDateString())
                ->orWhere(function ($q) use ($now) {
                    $q->where('appointment_date', $now->toDateString())
                        ->where('appointment_time', '<', $now->toTimeString());
                });
        })->delete();

        $this->info("Deleted $deleted past appointments.");
    }
}
