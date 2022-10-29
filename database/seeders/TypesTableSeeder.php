<?php

namespace Database\Seeders;

use App\Models\type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $models = [
        //     'users',
        //     'products',
        //     'levels',
        //     'questions',
        // ];


        $models = [
            "hard" => 'question',
            "mediam" => 'question',
            "easy" => 'question',
            "low" => 'question',
            "gaming" => 'user',
            "admin" => 'user',
            "helper" => 'product',
            "coin" => 'product',
            'pending' => "order",
            'confirm' => "order",
            'visa' =>  "payment_method",
            'master' => "payment_method",
            'coin_buacks' => "payment_method",
            'debit' => "wallet_status",
            'credit' => "wallet_status",
        ];

        foreach ($models as $key => $model) {
            # code...
            $types = Type::create([
                'model' => $model,
                'name' => $key,
            ]);
        }
    }
}
