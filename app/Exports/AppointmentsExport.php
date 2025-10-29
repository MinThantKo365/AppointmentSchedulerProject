<?php

namespace App\Exports;

use App\Models\Appointments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppointmentsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $counter = 0; 
    public function collection()
    {
        return DB::table('appointments')
            ->join('users', 'appointments.user_id', '=', 'users.id')
            ->select('appointments.title',
             'appointments.description', 'appointments.appointment_date',  
             DB::raw('DATE_FORMAT(appointments.appointment_time, "%h:%i %p") as appointment_time'))
            ->where('appointments.user_id', Auth::user()->id)
            ->orderBy('appointments.appointment_date', 'asc')
            ->orderBy('appointments.appointment_time', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Description',
            'Date (yy-mm-dd)',
            'Time',
        ];
    }
    public function map($row): array
    {
        $this->counter++;
        return [
            $this->counter,
            $row->title,
            $row->description,
            $row->appointment_date,
            $row->appointment_time,
        ];
    }
}
