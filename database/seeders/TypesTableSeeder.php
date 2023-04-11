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
            ["name" => "hard",  "model" => 'question'],
            ["name" => "mediam",  "model" => 'question'],
            ["name" => "easy",  "model" => 'question'],
            ["name" => "low",  "model" => 'question'],
            ["name" => "gaming",  "model" => 'user'],
            ["name" => "admin",  "model" => 'user'],
            ["name" => "helper",  "model" => 'product'],
            ["name" => "coin",  "model" => 'product'],
            ["name" => 'pending',  "model" => "order"],
            ["name" => 'confirm',  "model" => "order"],
            ["name" => 'visa',  "model" =>  "payment_method"],
            ["name" => 'master',  "model" => "payment_method"],
            ["name" => 'coin',  "model" => "payment_method"],
            ["name" => 'debit',  "model" => "wallet_status"],
            ["name" => 'credit',  "model" => "wallet_status"],
            ["name" => 'used',  "model" => "wallet_status"],
            ["name" => 'rewards',  "model" => "wallet_status"],
            ["name" => 'coin',  "model" => "wallet"],
            ["name" => 'helper',  "model" => "wallet"],
            ["name" => 'bucks',  "model" => "wallet"],
            ["name" => 'basic',  "model" => "question_status"],
            ["name" => 'additional',  "model" => "question_status"],

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
