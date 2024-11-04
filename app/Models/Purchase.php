<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['medicine_id', 'quantity', 'purchase_date'];
    protected $casts = [
        'purchase_date' => 'datetime', // Cast purchase_date to a Carbon instance
    ];


    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
