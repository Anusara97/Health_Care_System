<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class User extends Model
// {
//     use HasFactory;
// }

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'telno', 'email', 'gender', 'nic', 'slmc_reg_no', 'role', 'password'];

    // Define relationships
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'id', 'id');
    }

    public function seniorPharmacist()
    {
        return $this->hasOne(SeniorPharmacist::class, 'id', 'id');
    }

    public function juniorPharmacist()
    {
        return $this->hasOne(JuniorPharmacist::class, 'id', 'id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'id');
    }
}
