<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = ['doctor_id', 'patient_id', 'appointment_date', 'appointment_time','status'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
