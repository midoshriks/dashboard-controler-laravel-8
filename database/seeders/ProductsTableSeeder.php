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
        $helper_id = 1;

        $products = [
            'gold' => '25.Kg',
            'silver' => '35.Kg',
            'bronzy' => '45.Kg',
        ];
        foreach ($products as $key => $value) {
            # code...
                # code...
                $product = Product::create([
                    'name' => $key,
                    'quantity' => $value,
                    'price' => '10.08',
                    'type_id' => '2',
                    'helpers_id' => $helper_id++,
                ]);
        }
    }
}
