<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sell extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_id',
        'quantity',
        'sell_date',
    ];
      /**
     * Define the relationship with the Medicine model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
    protected $casts = [
        'sell_date' => 'datetime', // Cast to a Carbon instance
    ];
}
