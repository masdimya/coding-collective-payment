<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'dimas ikbalul aulia',
        ]);

        DB::table('user_balance')->insert([
            'user_id' => 1,
            'balance' => 1000000,
            'balance_wallet' => 1000000,

        ]);

        DB::table('payment_customer')->insert([
            'name' => 'dimas ikbalul aulia',
        ]);

        DB::table('payment_balance')->insert([
            'cust_id' => 1,
            'balance' => 1000000,
        ]);

        DB::table('payment_webhook')->insert([
            'cust_id' => 1,
            'url' => 'http://app-client:8000/api/hook-transaction',
        ]);
    }
}
