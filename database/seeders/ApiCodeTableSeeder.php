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
    }
}
