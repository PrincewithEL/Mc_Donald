<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance_Form extends Model
{
    use HasFactory;

    protected $table = 'insurance_forms';

    protected $fillable = [
        'practitioner_name',
        'practitioner_stamp',
        'postal_address',
        'tel_no',
        'mobile',
        'email',
        'patient_full_name',
        'patient_date_of_birth',
        'member_full_name',
        'member_tel_no',
        'member_no',
        'member_employer_name',
        'member_department_branch',
        'previous_sickness',
        'sickness_details',
        'diagnosis',
        'treatment_prescribed',
        'medicines',
        'radiology',
        'pathology',
        'hospital_name',
        'consultant_referred_to',
        'consultant_specialty',
        'medication_prescribed',
        'doctor_signature',
        'doctor_signature_date',
        'member_signature',
        'member_signature_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

