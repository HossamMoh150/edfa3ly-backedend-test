<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    protected $fillable = [
        'currency',
    ];

    public function bill()
    {
        return $this->hasMany(bill::class);
    }


    public function orderProducts()
    {
        return $this->hasMany(orderProducts::class);
    }

}
