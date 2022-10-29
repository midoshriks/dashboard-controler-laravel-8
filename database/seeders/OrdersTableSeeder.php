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
        $users_orders = User::all();
        $users_products = Product::all();

        // test by products
        foreach ($users_products as $key => $user_product) {
            # code...
            $order = Order::create([
                'order_numper' =>  1000 . $key + 1,
                'user_id' => $key + 1, // user->id
                'payment_method_id' => 11, // type paynent_method = vsie;
                'product_id' => $user_product->id,
                'type_id' =>  9, // type order = pending;
                'amount' => $user_product->quantity,  //quantity,
                'total' => $user_product->price, //price,
            ]);
        }

        // test users

        // foreach ($users_orders as $key => $user_order) {
        //     # code...
        //     $order = Order::create([
        //         'order_numper' =>  1000 . $key+1,
        //         'user_id' => $user_order->id,
        //         'payment_method_id' => 11, // type paynent_method = vsie;
        //         'product_id' => $user_order->products->id,
        //         'type_id' => 9, // type order = pending;
        //         'amount' => $user_order->products->quantity,
        //         'total' => $user_order->products->price,
        //     ]);
        // }


        // for ($i = 1; $i < 5; $i++) {
        //     # code...
        //     $orders = Order::create([
        //         'order_numper' =>  1000 . $i,
        //         'user_id' => $i, // $users->id,
        //         'payment_method_id' => 1,
        //         'product_id' => $i, // $products->id,
        //         'type_id' => 9, // $types->id,
        //         'amount' => 25, // $products->quantity,
        //         'total' =>  1000, // $products->price,

        //     ]);
        // }



        // for ($i = 1; $i < 5; $i++) {
        //     # code...
        //     $orders = Order::create([
        //         'order_numper' =>  1000 . $i + 3,
        //         'user_id' => $i, // $users->id,
        //         'payment_method_id' => 1,
        //         'product_id' => $i + 4, // $products->id,
        //         'type_id' => 10, // $types->id,
        //         'amount' => 25, // $products->quantity,
        //         'total' =>  2000, // $products->price,
        //     ]);
        // }
    }
}
