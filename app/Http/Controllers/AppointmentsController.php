<?php

namespace App\Http\Controllers;

use App\Exports\AdminAppointmentsExport;
use Carbon\Carbon;
use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\AppointmentsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\AppointmentRequest;

class AppointmentsController extends Controller
{
    public function apt_index()
    {
        $user_apt = DB::table('appointments')
            ->where('user_id', Auth::user()->id)
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        $admin_apt = DB::table('appointments')
            ->join('users', 'appointments.user_id', '=', 'users.id')
            ->select('appointments.*', 'users.name')
            ->orderBy('appointments.appointment_date', 'asc')
            ->orderBy('appointments.appointment_time', 'asc')
            ->get();
        return view('app.appointment', compact('user_apt', 'admin_apt'));
    }

    public function apt_create()
    {
        // dd(Auth::user()->id);
        return view('app.appointment_create');
    }

    public function apt_create_post(AppointmentRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            DB::table('appointments')->insert([
                'user_id'               => Auth::user()->id,
                'title'                 => $request->title,
                'description'           => $request->description,
                'appointment_date'      => $request->appointment_date,
                'appointment_time'      => $request->appointment_time,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now(),
            ]);

            return back()->with('success', 'Appointment created successfully.');
        }
        return back()->with('err', 'Failed to create appointment.');
        // dd($data);
    }

    public function appointment_delete($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointmentTitle = $appointment->title;
        $appointment->delete();

        return redirect()->back()->with('success', "Appointment Title ($appointmentTitle) deleted successfully.");
    }

    public function appointment_delete_by_admin($id)
    {
        $appointment = Appointments::with('user')->findOrFail($id);
        $appointmentTitle = $appointment->title;
        $appointmentName = $appointment->user->name;

        $appointment->delete();

        return redirect()->back()->with('success', "$appointmentName`s Appointment Title ($appointmentTitle) deleted successfully.");
    }

    public function appointment_export()
    {
        $user = Auth::user();
        $fileName = $user->name . '_' . $user->id . '.xlsx';
        return Excel::download(new AppointmentsExport,  $fileName);
    }

     public function admin_appointment_export()
    {
        $user = Auth::user();
        $fileName = $user->name . '_' . $user->id . '.xlsx';
        return Excel::download(new AdminAppointmentsExport,  $fileName);
    }
}
