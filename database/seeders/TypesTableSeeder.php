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
        $models = [
            'users',
            'products',
            'levels',
        ];

        foreach ($models as $key => $model) {
            # code...
            $types = type::create([
                'modal' => $model,
                'name' => $model,
            ]);
        }
    }
}
