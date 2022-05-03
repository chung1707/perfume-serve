<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = ['nam', 'nữ', 'unisex'];
        $postCategories = ['review', 'khuyến mãi ', 'kiến thức', 'Tâm sự mùi hương'];
        for($i =0; $i<count($productCategories); $i++){
            Category::factory()->count(1)
            ->state([
                'name' => $productCategories[$i],
            ])
            ->create();
        }
        for($i =0; $i<count($postCategories); $i++){
            Category::factory()->count(1)
            ->state([
                'name' => $postCategories[$i],
                'for_product' => true
            ])
            ->create();
        }
    }
}
