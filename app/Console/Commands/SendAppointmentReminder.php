<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Mail\ReminderMail;
use App\Models\Appointments;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails before appointments';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $appointments = DB::table('appointments')
            ->join('users', 'appointments.user_id', '=', 'users.id')
            ->select('appointments.*', 'users.email')
            ->whereDate('appointments.appointment_date', $now->toDateString())
            ->whereTime('appointments.appointment_time', '>', $now->format('H:i:s'))
            ->orderByRaw('TIMESTAMP(appointments.appointment_date, appointments.appointment_time) ASC')
            ->get();

        if ($appointments->isNotEmpty()) {
            $appointment = $appointments->first();
            $appointmentTime = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time);
            $diff = $now->diffInMinutes($appointmentTime, false);

            if ($diff > 0 && $diff <= 60) {
                Mail::to($appointment->email)
                    ->queue(new ReminderMail($appointment));

                $this->info("Reminder queued for appointment ID {$appointment->id}, diff: {$diff} mins");
            } else {
                $this->info("Next appointment ID {$appointment->id} is not within the reminder window (diff: {$diff} mins).");
            }
        } else {
            $this->info("No upcoming appointments today.");
        }
    }
}
