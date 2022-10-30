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
            ["model" => "hard",  "name" => 'question'],
            ["model" => "mediam",  "name" => 'question'],
            ["model" => "easy",  "name" => 'question'],
            ["model" => "low",  "name" => 'question'],
            ["model" => "gaming",  "name" => 'user'],
            ["model" => "admin",  "name" => 'user'],
            ["model" => "helper",  "name" => 'product'],
            ["model" => "coin",  "name" => 'product'],
            ["model" => 'pending',  "name" => "order"],
            ["model" => 'confirm',  "name" => "order"],
            ["model" => 'visa',  "name" =>  "payment_method"],
            ["model" => 'master',  "name" => "payment_method"],
            ["model" => 'coin',  "name" => "payment_method"],
            ["model" => 'debit',  "name" => "wallet_status"],
            ["model" => 'credit',  "name" => "wallet_status"],
            ["model" => 'used',  "name" => "wallet_status"],
        ];

        // $models = [
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        //     ["model" => 'hard', "name" => 'questio'],
        // ];

        foreach ($models as $key => $model) {
            # code...
            type::create($model);
            // $types = Type::create([
            //     "model" => $model,
            //     "name" => $key,
            // ]);
        }
    }
}
