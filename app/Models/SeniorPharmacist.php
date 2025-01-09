<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorPharmacist extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'se_ph_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
