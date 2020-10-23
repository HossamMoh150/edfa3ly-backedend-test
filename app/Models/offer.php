<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    protected $fillable = [
       'product_id', 'percent_off'
    ];




    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function offer_condition()
    {
        return $this->hasMany(offerCondition::class);
    }

}
