<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $fillable = [
        'subtotal' ,'taxes' ,  'discount' ,   'total'  ,'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }
}
