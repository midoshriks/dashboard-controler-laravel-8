<?php

namespace Database\Seeders;

use App\Models\type;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\WalletLogs;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $products = Product::all();
        $types = type::where('model', 'order')->get();
        $wallets_logs = WalletLogs::all();


        for ($i = 1; $i < 5; $i++) {
            # code...
            $orders = Order::create([
                'order_numper' =>  1000 . $i,
                'user_id' => $i, // $users->id,
                'payment_method_id' => 1,
                'product_id' => $i, // $products->id,
                'type_id' => 9, // $types->id,
                'amount' => 25, // $products->quantity,
                'total' =>  1000, // $products->price,

            ]);
        }



        for ($i = 1; $i < 5; $i++) {
            # code...
            $orders = Order::create([
                'order_numper' =>  1000 . $i + 3,
                'user_id' => $i, // $users->id,
                'payment_method_id' => 1,
                'product_id' => $i + 4, // $products->id,
                'type_id' => 10, // $types->id,
                'amount' => 25, // $products->quantity,
                'total' =>  2000, // $products->price,
            ]);
        }
    }
}
