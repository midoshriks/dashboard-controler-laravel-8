<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrdersApiController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'payment_method_id' => 'required',
            'product_id' => 'required',
            'type_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $order = new Order();
            $order->order_numper =  '1000' . $order->count('order_numper') + 1;
            $order->user_id = $request->user_id;
            // $order->user_id = Auth::user()->id;
            $order->payment_method_id = $request->payment_method_id;
            $order->product_id = $request->product_id;
            $order->type_id = $request->type_id;
            $product = Product::where('id', $request->product_id)->first();
            // dd($product);
            $order->amount = $product->quantity;
            $order->total = $product->price;

            // dd($order);
            $order->save();
        }

        $response = [
            'status' => true,
            'message' => "The Orders has been Creared successfully!"
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {
        $order = Order::select([
            'order_numper',
            'user_id',
            'payment_method_id',
            'product_id',
            'amount',
            'total',
        ])->where('id', $id)->with('type_method', 'users')->with([
            'products' => function ($q) {
                $q->with('type');
            }
        ])->first();

        // $date = [
        //     $order->order_numper,
        //     $order->users->first_name,
        //     $order->type_method->name,
        //     $order->type->name,
        //     $order->amount,
        //     $order->products->price,
        // ];
        // dd($order);

        return response()->json(['order' => $order], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
