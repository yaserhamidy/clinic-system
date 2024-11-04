<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    protected $table = ("medicines");
    protected $primaryKey = 'medicine_id';


    protected $fillable = ['medicine_name', 'amount', 'description'];

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'medicine_id');
    }

    public function sells()
    {
        return $this->hasMany(Sell::class, 'medicine_id');
    }
}
