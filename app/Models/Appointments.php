<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'appointment_date',
        'appointment_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
