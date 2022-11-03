<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
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
        $wallet_used->helper_id = $request->helper_id;
        $wallet_used->method = 16; // used helpers
        $wallet_used->amount = 1; // qount
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
    public function show(WalletLog $walletLogs)
    {
        //
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
