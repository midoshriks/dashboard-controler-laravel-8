<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\type;
use App\Models\Order;
use App\Models\WalletLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = type::where('model', 'order');
        $orders = Order::all();

        return view('dashboard.orders.index', compact('types', 'orders'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updatetype(Request $request, Order $order)
    {
        $order_type = Order::find($request->id);
        if ($order_type->type_id == 10) { // 10 = confirm
            # code...
            $order_type->type_id = $request->type_id;

            $order_type->save();
            // delete row on table confirm wallet _logs delete_wallet()
            $delete_wallet = WalletLogs::where('order_id', $order_type->id)->delete();
            // $delete_wallet->delete();

            // dd($delete_wallet);
            // dd($order_type->type_id);
            Alert::toast('Success Order pending ' . $order->order_numper);
        } else {
            # code...
            $order_type->type_id = $request->type_id;

            $order_type->save();
            WalletLogs::create([
                'wallet_id' => $order_type->user_id,
                'type_id' =>  $order_type->products->type_id,
                'order_id' => $order_type->id,
                'helper_id' => $order_type->products->helper_id,
                'method' => 'debit',
                'amount' => $order_type->amount,
            ]);

            // dd($order_type);
            // dd($order_type->type_id);
            Alert::toast('Success Order confirm ' . $order->order_numper);
        }

        return redirect()->route('dashboard.orders.index');
    }
}
