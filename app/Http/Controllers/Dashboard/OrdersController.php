<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\type;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WalletLog;
use Illuminate\Support\Facades\DB;
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

        $pending_id = DB::table('types')->where('model', 'order')->where('name', 'pending')->first();
        $confirm_id = DB::table('types')->where('model', 'order')->where('name', 'confirm')->first();
        // dd($confirm_id->name,$pending_id->id, $confirm_id->id);

        return view('dashboard.orders.index', compact('types', 'orders', 'pending_id','confirm_id'));
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
    public function active_order(Request $request, Order $order)
    {
        $order = Order::findOrFail($request->id);
        $type = type::where('id', $order->type_id)->first();
        $user_by = User::where('id', $order->user_id)->first();
        // return $order;
        // dd($order->type_id,  $type->id);


        if ($order->type_id == $type->id) {
            # code...

            $checked = type::where('id', $request->type_id)->first();

            // function confirm
            if ($checked->model == 'order' && $checked->name == 'confirm') {
                # code...
                // return 'yes';
                $order->type_id = $request->type_id;
                $order->save();
                // dd($order->type_id,  $type->id);

                // ==================================Add Wallet User===================================

                $wallet_status_debit = DB::table('types')->where('model', 'wallet_status')->where('name', 'debit')->first();
                $wallet_status_credit = DB::table('types')->where('model', 'wallet_status')->where('name', 'credit')->first();
                $wallet_status_used = DB::table('types')->where('model', 'wallet_status')->where('name', 'used')->first();


                // Add product in wallet coin => dd(!$order->products->helper_id);
                if (!$order->products->helper_id) {
                    # code...
                    // return $order;
                    $get_type_product = DB::table('types')->where('model', 'wallet')->where('name', $order->products->type->name)->first();

                    // dd($wallet_status_id->id, $type_id->id, $order->products->type->name, $order);
                    // add in wallet coin
                    WalletLog::create([
                        'wallet_id' => $order->user_id, // user
                        'type_id' =>  $get_type_product->id, // 18, // in table types model = wallet => id
                        'order_id' => $order->id,
                        'helper_id' => $order->products->helper_id,
                        'wallet_status_id' => $wallet_status_debit->id, // 14, // 'debit',
                        'amount' => $order->amount,
                    ]);
                } else {
                    # code...
                    // get id user form order in form walletlog
                    $user_id = $order->users->id;
                    // dd($user_id);
                    $checked_balance = WalletLog::where('wallet_id', $user_id)->first();

                    $get_type_product = DB::table('types')->where('model', 'wallet')->where('name', $order->products->type->name)->first();

                    // dd($get_type_product->name, $wallet_status_credit->name, $checked_balance->wallet_id, $order->order_numper);

                    // credit coin from user by to debit helper
                    WalletLog::create([
                        'wallet_id' => $checked_balance->wallet_id,
                        'type_id' => $checked_balance->type_id, // 18, // in table types model = wallet => id
                        'order_id' => $order->id, // order by helper
                        'helper_id' => $checked_balance->helper_id,
                        'wallet_status_id' =>   $wallet_status_credit->id, // 'credit',
                        'amount' => $checked_balance->amount,
                    ]);

                    WalletLog::create([
                        'wallet_id' => $order->user_id,
                        'type_id' =>   $get_type_product->id, // 19, // in table types model = wallet => id
                        'order_id' => $order->id,
                        'helper_id' => $order->products->helper_id,
                        'wallet_status_id' =>  $wallet_status_debit->id, // 14, // 'debit'
                        'amount' => $order->amount,
                    ]);
                }

                // ==================================Add Wallet User===================================
                Alert::toast('Success Order ' . $order->order_numper . ' by User ' . $user_by->first_name . ' Confirm');
            }

            // end function confirm


            // function pending
            else {
                # code...
                $checked = type::where('id', $request->type_id)->first();
                if ($checked->model == 'order' && $checked->name == 'pending') {
                    # code...
                    // return 'yes';
                    $order->type_id = $request->type_id;
                    $order->save();
                    // delete row on table confirm wallet _logs delete_wallet()
                    $delete_wallet = WalletLog::where('order_id', $order->id)->delete();
                    // $delete_wallet->delete();
                    // dd($order->type_id,  $type->id);
                }
                Alert::toast('Success Order ' . $order->order_numper . ' by User ' . $user_by->first_name . ' Pending');
            }
            // end function pending


            return redirect()->route('dashboard.orders.index');
        }

        // ==========================OLD FUNCTIONS===========================================

        // $order_type = Order::find($request->id);
        // if ($order_type->type_id == 10) { // 10 = confirm
        //     # code...
        //     $order_type->type_id = $request->type_id;

        //     $order_type->save();
        //     // delete row on table confirm wallet _logs delete_wallet()
        //     $delete_wallet = WalletLog::where('order_id', $order_type->id)->delete();
        //     // $delete_wallet->delete();

        //     // dd($delete_wallet);
        //     // dd($order_type->type_id);
        //     Alert::toast('Success Order pending ' . $order->order_numper);
        // } else {
        //     # code...
        //     $order_type->type_id = $request->type_id;

        //     $order_type->save(); // end function confirm

        //     if (!$order_type->products->helper_id) {
        //         // dd('null helper_id');
        //         # code...
        //         WalletLog::create([
        //             'wallet_id' => $order_type->user_id,
        //             'type_id' =>  18, // in table types model = wallet => id
        //             'order_id' => $order_type->id,
        //             'helper_id' => $order_type->products->helper_id,
        //             'wallet_status_id' =>   14, // 'debit',
        //             'amount' => $order_type->amount,
        //         ]);
        //     } else {
        //         $user_id = $order_type->users->id;
        //         $total = WalletLog::where('wallet_id', $user_id)->first();

        //         // $total_amount_user = $total->sum('amount');
        //         // if ($total_amount_user == $order_type->amount) {
        //         //     # code...
        //         // }

        //         // dd($order_type->amount);
        //         // dd($total_amount_user);

        //         // dd($total);

        //         WalletLog::create([
        //             'wallet_id' => $total->wallet_id,
        //             'type_id' =>  18, // in table types model = wallet => id
        //             'order_id' => $order_type->id, // order by helper
        //             'helper_id' => $total->helper_id,
        //             'wallet_status_id' =>   15, // 'credit',
        //             'amount' => $total->amount,
        //         ]);

        //         // dd('helper_id');
        //         WalletLog::create([
        //             'wallet_id' => $order_type->user_id,
        //             'type_id' =>  19, // in table types model = wallet => id
        //             'order_id' => $order_type->id,
        //             'helper_id' => $order_type->products->helper_id,
        //             'wallet_status_id' =>   14, // 'debit'
        //             'amount' => $order_type->amount,
        //         ]);
        //     }

        //     // dd($order_type);
        //     // dd($order_type->type_id);
        //     Alert::toast('Success Order confirm ' . $order->order_numper);
        // }
        // return redirect()->route('dashboard.orders.index');

        // ===========================OLD FUNCTIONS==========================================

    }
}
