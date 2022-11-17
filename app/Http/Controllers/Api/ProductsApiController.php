<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Helper;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::select([
        //     'products.id',
        //     'products.quantity',
        //     'products.price',
        // ])->with('type')->get();

        $products = Product::select([
            'products.id',
            'products.type_id', // stop mo2men look this
            'products.quantity',
            'products.price',
        ])->whereHas('type', function ($q) {
            $q->where('name', 'coin');
        })->get();

        return response()->json(['message' => "The Coins has been Get successfully!", 'products' => $products], 200, [], JSON_PRESERVE_ZERO_FRACTION);
        // return response()->json(['status' => 200, 'message' => "The Coins has been Get successfully!", 'products' => $products]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::find($id);
        // dd($product);

        // $product = Product::where('id', $id)->select(
        // 'id'
        // 'product.id',
        // 'quantity',
        // 'price',
        // )->with(['type' => function ($q) {
        // $q;
        // }])->first();

        return response()->json(['message' => "The Coins has been Get successfully!", 'product' => $product], 200, [], JSON_PRESERVE_ZERO_FRACTION);
        // return response()->json(['prodect' => $product], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
