<?php

namespace App\Repositories\Order;

use App\Models\type;
use App\Models\WalletLog;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function conferm_order($order)
    {
        $order->type_id = get_type('order','confirm')->id;
        //? $order->type_id = type::TYPE_ORDER_CONFIRM; //? id = 10
        //! $order->type_id = '10';
        $order->save();

        $wallet_id = $order->users->wallets->id;
        $get_type_product =  get_type('wallet', $order->products->type->name);
        $wallet_status_debit = get_type('wallet_status', 'debit');


        //? credit in wallet logs if product helper
        if ($order->products->helper_id) {
            $get_type_coin =  get_type('wallet', 'coin');
            $wallet_status_credit = get_type('wallet_status', 'credit');

            WalletLog::create([
                'wallet_id' =>  $wallet_id,
                'type_id' => $get_type_coin->id,
                'order_id' => $order->id,
                'helper_id' => $order->products->helper_id,
                'wallet_status_id' =>   $wallet_status_credit->id,
                'amount' => $order->products->price,
            ]);
        }

        //? debit in wallet logs
        WalletLog::create([
            'wallet_id' => $wallet_id,
            'type_id' =>  $get_type_product->id,
            'order_id' => $order->id,
            'helper_id' => $order->products->helper_id,
            'wallet_status_id' => $wallet_status_debit->id,
            'amount' => $order->amount,
        ]);
    }
}
