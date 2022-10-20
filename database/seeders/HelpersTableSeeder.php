<?php

namespace Database\Seeders;

use App\Models\Helper;
use App\Models\Product;
use Illuminate\Database\Seeder;

class HelpersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $helpers = [
            'add time',
            'delete a question',
            'delete two answers',
            'call a friend',
        ];

        foreach ($helpers as $key => $value) {
            # code...
            $helper = Helper::create([
                'name' => $value
            ]);
        }

        $helper_id = 1;
        $products = [
            '100',
            '200',
            '300',
            '400',
        ];
        foreach ($products as $key => $value) {
            # code...
            $product = Product::create([
                'quantity' => $value,
                'price' => '10.00',
                'type_id' => '7',
                'helper_id' => $helper_id++,
            ]);
        }
    }
}
