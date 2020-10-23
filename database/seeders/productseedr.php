<?php

namespace Database\Seeders;

use App\Models\offer;
use Illuminate\Database\Seeder;

class productseedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$products = [
        [
            'name'        => 'T-shirt',
            'price'         => '10.99',
        ],
        [
            'name'        => 'Jacket',
            'price'         => '19.99',
        ],
        [
            'name'        => 'Pants',
            'price'         => '14.99',
        ],
        [
            'name'        => 'shoes',
            'price'         => '24.99',
        ]];

        $offers=[
            [
                'percent_off' => '10',
                'product_id' =>'1'
            ],
            [
                'percent_off' => '50',
                'product_id' =>'2'
            ]
        ];
        foreach ($products as $product){
            $id=product::create($product)->id;

        }
        foreach ($offers as $offer){
            $id = offer::create($offer);
        }
    }

}