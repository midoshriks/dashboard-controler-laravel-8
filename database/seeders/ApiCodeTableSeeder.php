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
            'type' => 'post',
            'model' => 'users',
            'route_api' => 'api/login',
        ]);
        $api_code = developer_api::create([
            'type' => 'post',
            'model' => 'users',
            'route_api' => 'api/register',
        ]);

        $api_code = developer_api::create([
            'type' => 'show',
            'model' => 'orders',
            'route_api' => 'api/dashboard/user/orders/1',
        ]);

        $api_code = developer_api::create([
            'type' => 'post',
            'model' => 'orders',
            'route_api' => 'api/dashboard/create/order',
        ]);

        $api_code = developer_api::create([
            'type' => 'post',
            'model' => 'walletlogs',
            'route_api' => 'api/dashboard/used/user/wallet',
        ]);

        $api_code = developer_api::create([
            'type' => 'post',
            'model' => 'userlevels',
            'route_api' => 'insert/level/user',
        ]);


    }
}
