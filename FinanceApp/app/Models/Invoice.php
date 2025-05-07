<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    protected $fillable = [
        'user_id',
        'status',
        'sub_total',
        'discount',
        'total',
        'invoice_created',
        'invoice_due_date',
    ];
    
}
