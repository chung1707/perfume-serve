<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            'code' => 'giam20',
            'discount' => '20',
            'validDate' => Carbon::create('2022', '07', '07')
        ]);
        DB::table('discounts')->insert([
            'code' => 'giam10',
            'discount' => '10',
            'validDate' => Carbon::create('2022', '07', '07')
        ]);
        DB::table('discounts')->insert([
            'code' => 'giam30',
            'discount' => '30',
            'validDate' => Carbon::create('2022', '07', '07')
        ]);
    }
}
