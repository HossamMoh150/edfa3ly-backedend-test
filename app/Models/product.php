<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
         'name', 'price',
    ];

    public function offer()
    {
        return $this->hasMany(offer::class);
    }


}
