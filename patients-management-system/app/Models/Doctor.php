<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
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
