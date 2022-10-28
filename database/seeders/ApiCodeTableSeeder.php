<?php

namespace Database\Seeders;

use App\Models\developer_api;
use Illuminate\Database\Seeder;

class ApiCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Levels
        $api_code = developer_api::create([
            'type' => 'get',
            'model' => 'levels',
            'route_api' => 'api/dashboard/levels',
        ]);

        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'levels',
            'route_api' => 'api/dashboard/level/1',
        ]);

        // Products
        $api_code = developer_api::create([
            'type' => 'get',
            'model' => 'products',
            'route_api' => 'api/dashboard/products/coins',
        ]);

        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'products',
            'route_api' => 'api/dashboard/products/coin/3',
        ]);

        // Helpers
        $api_code = developer_api::create([
            'type' => 'get',
            'model' => 'helpers',
            'route_api' => 'api/dashboard/products/helpers',
        ]);

        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'helpers',
            'route_api' => 'api/dashboard/products/helper/1',
        ]);

        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'helpers',
            'route_api' => 'api/login',
        ]);
        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'helpers',
            'route_api' => 'api/register',
        ]);


    }
}
