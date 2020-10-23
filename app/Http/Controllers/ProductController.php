<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\IndexResponse;
use App\Models\product;
use App\Responses\Facades\ResponseFacade;
use App\Transformers\productTransformer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ResponseFacade::indexRespond(
            fractal(
                (new IndexResponse(product::with(['offer'])))->execute()
                , new productTransformer()
            )
        );
    }

    public function create()
    {

    }


    public function store(productRequest $request)
    {
        $data = $request->validated();

        product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
