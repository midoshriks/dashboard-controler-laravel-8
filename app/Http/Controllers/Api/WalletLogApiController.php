<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wallets;
use App\Models\WalletLog;
use Illuminate\Http\Request;

class WalletLogApiController extends Controller
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
        $wallet_used = new WalletLog();
        $wallet_used->wallet_id = $request->user_id;
        $wallet_used->type_id = $request->type_id;
        $wallet_used->order_id = $request->order_id;
        $get_prodeuct = Product::where('id', $request->type_id)->first(); // get qount
        $wallet_used->helper_id = $get_prodeuct->helper_id;
        $wallet_used->wallet_status_id = $request->wallet_status_id; // used helpers
        $wallet_used->amount = $get_prodeuct->quantity;
        $wallet_used->save();
        $response = [
            'status' => true,
            'message' => "The Orders has been Used successfully!"
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallets  $wallets
     * @return \Illuminate\Http\Response
     */
    public function show(WalletLog $walletLogs, $id)
    {

        // send_notification(['djPVhJ0fTE-BZ0QxPV1xAT:APA91bE3ziX-RxOHfGRMvOzfPHeOTWMJGkmnCJAr8liQrrhUKwU-2-oxGIRgijSAbl3bIaLxQEb9mAD8CFnQRigJ01XCG8YEmOghQnVxLq4ii5XR2nNhFjjsKijzzsMY5E2uyLHSTSWI'], 'test', 'laravel');
        $wallet = Wallets::find($id);
        $coins = $wallet->balance('coin');
        $bucks = $wallet->balance('bucks');
        // dd($wallet->walletLogs()->pluck('helper_id'));
        // $helper_id = $wallet->walletLogs()->pluck('helper_id');
        $helpers = [];
       for ($i=1; $i < 5; $i++) {
            $helpers[$i] = $wallet->balance('helper', $i);
        }
        // dd($helpers);
        // $helper_1 = $wallet->balance('helper', 1);
        // $helper_2 = $wallet->balance('helper', 2);
        // $helper_3 = $wallet->balance('helper', 3);
        // $helper_4 = $wallet->balance('helper', 4);
        return response()->json(['message' => "The wallet has been Get successfully!", 'coins' => $coins, 'bucks' => $bucks,'helpers' => $helpers], 200, [], JSON_PRESERVE_ZERO_FRACTION);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallets  $wallets
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletLog $walletLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallets  $wallets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletLog $walletLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallets  $wallets
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletLog $walletLogs)
    {
        //
    }
}
