<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(HelpersTableSeeder::class);
        $this->call(ApiCodeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(WalletLogsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        // $this->call(AnswersTableSeeder::class);

    }
}
