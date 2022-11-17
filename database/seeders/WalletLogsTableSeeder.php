<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\WalletLog;
use Illuminate\Database\Seeder;

class WalletLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_balance = User::where('role_permissions', 'balance')->get();

        for ($i = 1; $i < 6; $i++) {
            # code...
            if ($i == 1) {
                # code...
                foreach ($user_balance as $key => $u_b) {
                    # code...
                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  18, // get types => model = wallet , name = coin;
                        'order_id' => null,
                        'helper_id' => null,
                        'wallet_status_id' => 14, // get types => model = wallet_stauts , name = debit;
                        'amount' => '25',
                    ]);
                }
            } elseif ($i == 2) {
                # code...
                foreach ($user_balance as $key => $u_b) {
                    # code...
                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  19, // get types => model = wallet , name = helper;
                        'order_id' => null,
                        'helper_id' => null, // get products helpers add time = id => 1;
                        'wallet_status_id' => 15, // get types => model = wallet_stauts , name = credit;
                        'amount' => '1',
                    ]);

                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  19, // get types => model = wallet , name = helper;
                        'order_id' => null,
                        'helper_id' => 1, // get products helpers add time = id => 1;
                        'wallet_status_id' => 14, // get types => model = wallet_stauts , name = debit;
                        'amount' => '1',
                    ]);
                }
            } elseif ($i == 3) {
                # code...
                foreach ($user_balance as $key => $u_b) {
                    # code...

                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  20, // get types => model = wallet , name = bucks;
                        'order_id' => null,
                        'helper_id' => null, // get products helpers add time = id => 1;
                        'wallet_status_id' => 14, // get types => model = wallet_stauts , name = debit;
                        'amount' => '1',
                    ]);
                }
            } elseif ($i == 4) {
                # code...
                foreach ($user_balance as $key => $u_b) {
                    # code...

                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  20, // get types => model = wallet , name = bucks;
                        'order_id' => null,
                        'helper_id' => null, // get products helpers add time = id => 1;
                        'wallet_status_id' => 17, // get types => model = wallet_stauts , name = rewards;
                        'amount' => '1',
                    ]);
                }
            } elseif ($i == 5) {
                # code...
                foreach ($user_balance as $key => $u_b) {
                    # code...

                    $wallet_logs = WalletLog::create([
                        'wallet_id' => $u_b->id,
                        'type_id' =>  19, // get types => model = wallet , name = helper;
                        'order_id' => null,
                        'helper_id' => 1, // get products helpers add time = id => 1;
                        'wallet_status_id' => 16, // get types => model = wallet_stauts , name = used;
                        'amount' => '1',
                    ]);
                }
            }
        }


        // $orders_wallets = Order::where('type_id', '10')->get(); // 10 = confirm

        // foreach ($orders_wallets as $key => $order) {
        //     # code...
        //     $wallet_logs = WalletLog::create([
        //         'wallet_id' => $order->user_id,
        //         'type_id' =>  $order->products->type_id,
        //         'order_id' => $order->id, // $order->users->wallets->id,
        //         'helper_id' => $order->products->helper_id,
        //         'wallet_status_id' => 14,
        //         'amount' => $order->amount,
        //     ]);
        // }
    }
}
