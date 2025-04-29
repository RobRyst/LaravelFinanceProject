<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected function user(): BelongsTo
    {
        return $this->belongsTo('User');

    }

    protected $fillable = [
        'customer',
        'total',
        'description'
    ];
    
}
