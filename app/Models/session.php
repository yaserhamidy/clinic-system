<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $table = ("sessions");
    protected $primaryKey = 'session_id';
}
