<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientAppointment extends Model
{
    use HasFactory;

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id')->whereHas('roles', function ($query) {
            $query->where('name', 'dokter');
        });
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class); 
    }

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date_of_appointment',
        'note',
        'prescription',
        'status',
    ];
}
