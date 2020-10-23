<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offerCondition extends Model
{
    protected $fillable = [
        'offer_id','counter'
    ];


    public function offer()
    {
        return $this->belongsTo(offer::class, 'offer_id');
    }
}
