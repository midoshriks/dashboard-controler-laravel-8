<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\WalletLogs;
use Illuminate\Database\Seeder;

class WalletLogssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders_wallets = Order::where('type_id', '10')->get(); // 10 = confirm

        foreach ($orders_wallets as $key => $order) {
            # code...
            $wallet_logs = WalletLogs::create([
                'wallet_id' => $order->user_id,
                'type_id' =>  $order->products->type_id,
                'order_id' => $order->id, // $order->users->wallets->id,
                'helper_id' => $order->products->helper_id,
                'method' => 'debit',
                'amount' => $order->amount,
            ]);
        }
    }
}
