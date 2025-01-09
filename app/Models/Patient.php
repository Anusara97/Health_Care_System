<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'patient_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
