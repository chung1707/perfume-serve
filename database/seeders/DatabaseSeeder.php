<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            ProductDetailsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            SuppliersSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            PicturesSeeder::class,
            OrdersSeeder::class,
            PostsSeeder::class,
            DiscountsSeeder::class,
            PoliciesSeeder::class,
        ]);
    }
}
