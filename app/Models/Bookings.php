<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
 protected $fillable = [
        'user_id',
        'doctor_id',
        'referral_doctor_id',
        'name',
        'email',
        'phone',
        'date',
        'start_time',
        'end_time',
        'details',
        'Status',
    ];
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

public function referralDoctor()
{
    return $this->belongsTo(User::class, 'referral_doctor_id');
}
}
