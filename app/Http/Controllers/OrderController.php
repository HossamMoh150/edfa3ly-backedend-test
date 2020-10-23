<?php

namespace App\Http\Controllers;

use App\IndexResponse;
use App\Models\bill;
use App\Models\offerCondition;
use App\Models\order;
use App\Models\orderProducts;
use App\Models\product;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\productTransformer;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        die(json_encode($request->toArray()));
        $order = order::create((
        [
            'currency' => $request['currency'],
        ]
        ));

        foreach ($request['products'] as $product) {
            orderProducts::create((
            [
                'product_id' => $product,
                'order_id' => $order->id,

            ]
            ));
        }

        $product_repeted = array_count_values($request['products']);
        $order_products = array_keys($product_repeted);


        $prices = [];
        $offers = [];
        $offers_Condition_product_count = [];
        $offers_Condition_product_id = [];
        foreach ($request['products'] as $product) {
            $data = product::where('id', $product)->with(['offer',])->get();

            array_push($prices, $data[0]['price']);
            $offer = $data[0]['offer'];
            if (count($offer) > 0) {
                array_push($offers, $offer[0]['percent_off']);
                $data2 = offerCondition::where('offer_id', $offer[0]['id'])->get();
                if (count($data2) > 0) {

                    array_push($offers_Condition_product_count, $data2[0]['counter']);
                    array_push($offers_Condition_product_id, $data2[0]['product_id']);
                } else {
                    array_push($offers_Condition_product_count, -1);
                    array_push($offers_Condition_product_id, -1);
                }

            } else {
                array_push($offers_Condition_product_count, -1);
                array_push($offers_Condition_product_id, -1);
                array_push($offers, -1);
//
            }


        }



        $subtotal = array_sum($prices);
        $taxes = round($subtotal * 0.14, 2);
        $discount = [];
        $price_after_discount = [];
        for ($i = 0; $i < count($prices); $i++) {
            if ($offers[$i] != -1) {
                if ($offers_Condition_product_id[$i] == -1) {

                    $discount[$i] = ($prices[$i] * ($offers[$i] / 100));
                    $price_after_discount[$i] = $prices[$i] - ($prices[$i] * ($offers[$i] / 100));
                } else {

                    if ($offers_Condition_product_count > $product_repeted["" . $offers_Condition_product_id[$i]]) {
                        $discount[$i] = ($prices[$i] * ($offers[$i] / 100));
                        $price_after_discount[$i] = $prices[$i] - ($prices[$i] * ($offers[$i] / 100));
                    }
                }
            }

        }
        $total = $subtotal + $taxes - array_sum($discount);
        echo 'Subtotal: $' . $subtotal .
            '<br>' .
            'Taxes: $' . $taxes .
            '<br>' .
            'Discounts: ' .
            '<br>';
        $k = 0;
        foreach ($offers as $item) {

            if ($item != -1) {
                echo $item . '% off ' . ': -$' . $discount[$k] . '<br>';
            }
            $k++;
        }
        echo "Total: " . $total;


    }
}