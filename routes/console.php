<?php

use Carbon\Carbon;
use App\Mail\ReminderMail;
use App\Models\Appointments;
use Symfony\Component\Clock\now;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Schedule::call(function () {
    $now = Carbon::now();

    Appointments::where(function ($query) use ($now) {
        $query->where('appointment_date', '<', $now->toDateString())
            ->orWhere(function ($q) use ($now) {
                $q->where('appointment_date', $now->toDateString())
                    ->where('appointment_time', '<', $now->toTimeString());
            });
    })->delete();

    $appointments = Appointments::whereDate('appointment_date', $now->toDateString())->get();

    foreach ($appointments as $appointment) {
        $appointmentTime = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time);
        $diff = $now->diffInMinutes($appointmentTime, false);

        // 3️⃣ Send reminders for appointments within next 30 minutes, not sent yet
        if ($diff > 0 && $diff <= 30 && !$appointment->reminder_sent) {
            Mail::to($appointment->user->email)->send(new ReminderMail($appointment));

            // Mark reminder as sent to prevent duplicates
            $appointment->update(['reminder_sent' => true]);
        }
    }
})->everyMinute();



// To run This schedule, use the command: php artisan schedule:run
