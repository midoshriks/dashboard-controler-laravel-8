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
            'file' => 'levels',
            'type' => 'get',
            'model' => 'level',
            'example' => 'Accept => application/json, Authorization => Bearer token',
            'route_api' => 'api/dashboard/level',
        ]);

        $api_code = developer_api::create([
            'file' => 'levels',
            'type' => 'get',
            'model' => 'level',
            'example' => 'Accept => application/json, Authorization => Bearer token',
            'route_api' => 'api/dashboard/level/{id}',
        ]);

        // Products
        $api_code = developer_api::create([
            'file' => 'products',
            'type' => 'get',
            'model' => 'product',
            'example' => 'Accept => application/json, Authorization => Bearer token',
            'route_api' => 'api/dashboard/helper',
        ]);
        $api_code = developer_api::create([
            'file' => 'products',
            'type' => 'get',
            'model' => 'product',
            'example' => 'Accept => application/json, Authorization => Bearer token',
            'route_api' => 'api/dashboard/coin',
        ]);

        // users
        $api_code = developer_api::create([
            'file' => 'users',
            'type' => 'post',
            'model' => 'auth',
            'example' => '{
            "first_name":"mido2",
            "last_name":"shriks2",
            "email":"tewst@gmail.com",
            "phone":"01298292897",
            "gender":"male",
            "dob_date":"2022-09-20",
            "password":"12345678" }',
            'route_api' => 'api/register',
        ]);

        $api_code = developer_api::create([
            'file' => 'users',
            'type' => 'post',
            'model' => 'auth',
            'example' => '
            {
                "email":"midoshriks36@gmail.com",
                "password":"12345678"
            }
            ',
            'route_api' => 'api/login',
        ]);

        $api_code = developer_api::create([
            'file' => 'level',
            'type' => 'post',
            'model' => 'user',
            'example' => 'user_id , level_id ,',
            'route_api' => 'api/dashboard/user/5',
        ]);

        $api_code = developer_api::create([
            'file' => 'users',
            'type' => 'put',
            'model' => 'user',
            'example' => 'first_name , last_name , dob_date , gender , country_id , password',
            'route_api' => 'api/dashboard/user/5',
        ]);

        // wallets
        $api_code = developer_api::create([
            'file' => 'wallets',
            'type' => 'post',
            'model' => 'wallet',
            'example' => 'user_id , type_id , helper_id ,',
            'route_api' => 'api/dashboard/user/level',
        ]);

        // orders
        $api_code = developer_api::create([
            'file' => 'orders',
            'type' => 'get',
            'model' => 'order',
            'example' => 'Accept => application/json, Authorization => Bearer token',
            'route_api' => 'api/dashboard/order/{id}',
        ]);

        $api_code = developer_api::create([
            'file' => 'orders',
            'type' => 'post',
            'model' => 'order',
            'example' => 'payment_method_id , product_id',
            'route_api' => 'api/dashboard/order',
        ]);




        // $api_code = developer_api::create([
        //     'type' => 'show',
        //     'model' => 'levels',
        //     'route_api' => 'api/dashboard/level/1',
        // ]);

        // // Products
        // $api_code = developer_api::create([
        //     'type' => 'get',
        //     'model' => 'products',
        //     'route_api' => 'api/dashboard/products/coins',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'show',
        //     'model' => 'products',
        //     'route_api' => 'api/dashboard/products/coin/3',
        // ]);

        // // Helpers
        // $api_code = developer_api::create([
        //     'type' => 'get',
        //     'model' => 'helpers',
        //     'route_api' => 'api/dashboard/products/helpers',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'show',
        //     'model' => 'helpers',
        //     'route_api' => 'api/dashboard/products/helper/1',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'users',
        //     'route_api' => 'api/login',
        // ]);
        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'users',
        //     'route_api' => 'api/register',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'show',
        //     'model' => 'orders',
        //     'route_api' => 'api/dashboard/user/orders/1',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'orders',
        //     'route_api' => 'api/dashboard/create/order',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'walletlogs',
        //     'route_api' => 'api/dashboard/used/user/wallet',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'userlevels',
        //     'route_api' => 'api/dashboard/level/user',
        // ]);

        // $api_code = developer_api::create([
        //     'type' => 'post',
        //     'model' => 'uaser',
        //     'route_api' => 'api/dashboard/update/user/5',
        // ]);


    }
}
