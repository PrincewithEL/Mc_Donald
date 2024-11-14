<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist__Sessions extends Model
{
    use HasFactory;
 protected $fillable = [
        'user_id',
        'therapist_id',
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
}
