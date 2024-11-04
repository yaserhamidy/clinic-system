<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = ("doctors");
    protected $primaryKey = 'doctor_id';

    public function patients()
    {
        return $this->hasMany(Patient::class, 'doctor_id', 'doctor_id');
    }
}
