<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            '25',
            '35',
            '45',
            '55',
        ];
        foreach ($products as $key => $value) {
            # code...
            $product = Product::create([
                'quantity' => $value,
                'price' => '10.00',
                'type_id' => '8',
                'helper_id' => null,
            ]);
        }
    }
}
