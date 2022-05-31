<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order::factory()->count(12)->create();
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-01-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-02-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-03-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-04-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-05-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        for($i=0; $i< 4; $i++){
            Order::factory()->count(1)
            ->state([
                'created_at' => '2022-06-27 16:24:20',
                'delivered' => true,
                'pending' => false,
            ])
            ->create();
        }
        //
    }
}
