<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'doctor_id', 'specialized_area'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
