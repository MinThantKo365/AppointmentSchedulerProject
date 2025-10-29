<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => [ 'required',function ($attribute, $value, $fail) {
                $date = $this->input('appointment_date'); // get the date from request
                $appointmentDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $value);

                if ($appointmentDateTime->isPast()) {
                    $fail('The appointment date and time must not be in the past.');
                }
            },]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required',
            'description.required' => 'The description field is required',
            'appointment_date.required' => 'The appointment date field is required',
            'appointment_time.required' => 'The appointment time field is required',
        ];
    }
}
