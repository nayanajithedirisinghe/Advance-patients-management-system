<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    // Fillable fields
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appt_date',
        'appt_time',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // Appointment belongs to a Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function appointments()
{
    return $this->hasMany(Appointment::class, 'patient_id');
}

public function medicalRecords()
{
    return $this->hasMany(MedicalRecord::class, 'patient_id');
}

public function labReports()
{
    return $this->hasMany(LabReport::class, 'patient_id');
}

public function bills()
{
    return $this->hasMany(Bill::class, 'patient_id');
}

}
