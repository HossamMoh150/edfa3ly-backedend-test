<?php

namespace App\Transformers;

use App\Models\product;
use League\Fractal\TransformerAbstract;

class productTransformer extends TransformerAbstract
{
    public function transform(product $product)
    {
        return $product->toArray();

//        return [
//            'id' => $product->id,
//        ];
    }
}