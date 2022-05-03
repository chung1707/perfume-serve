<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\supplier;
use App\Models\category;
use App\Models\productDetail;
use App\Models\product;
use App\Models\picture;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products= [
            [
                'name' => 'Beach Walk',
                'category_id' => 2,
                'supplier_id' => 12,
                'product_detail_id' => 1
            ],
            [
                'name' => 'Ormonde Jayne Damask',
                'category_id' => 2,
                'supplier_id' => 12,
                'product_detail_id' => 2
            ],
            [
                'name' => 'Replica Matcha Meditation',
                'category_id' => 2,
                'supplier_id' => 12,
                'product_detail_id' => 3
            ],
            [
                'name' => 'Signorina',
                'category_id' => 2,
                'supplier_id' => 4,
                'product_detail_id' => 4
            ],
            [
                'name' => 'Replica Lazy Sunday Morning',
                'category_id' => 2,
                'supplier_id' => 12,
                'product_detail_id' => 5
            ],
            [
                'name' => 'Jean Paul Gaultier So Scandal',
                'category_id' => 2,
                'supplier_id' => 2,
                'product_detail_id' => 6
            ],
            [
                'name' => 'Kilian Voulez-Vous Coucher Avec Moi',
                'category_id' => 2,
                'supplier_id' => 5,
                'product_detail_id' => 7
            ],
            [
                'name' => 'Royal Princess Oud',
                'category_id' => 2,
                'supplier_id' => 1,
                'product_detail_id' => 8
            ],
            [
                'name' => 'Love in White',
                'category_id' => 2,
                'supplier_id' => 1,
                'product_detail_id' => 9
            ],
            [
                'name' => 'Fleur de Gardenia',
                'category_id' => 2,
                'supplier_id' => 1,
                'product_detail_id' => 10
            ],
            [
                'name' => 'Creed Viking',
                'category_id' => 1,
                'supplier_id' => 1,
                'product_detail_id' => 11
            ],
            [
                'name' => 'Acqua di Gio Profondo',
                'category_id' => 1,
                'supplier_id' => 3,
                'product_detail_id' => 12
            ],
            [
                'name' => 'Creed Himalaya',
                'category_id' => 1,
                'supplier_id' => 1,
                'product_detail_id' => 13
            ],
            [
                'name' => 'Roja Elysium Parfum Cologne',
                'category_id' => 1,
                'supplier_id' => 7,
                'product_detail_id' => 14
            ],
            [
                'name' => 'Dark Lord',
                'category_id' => 1,
                'supplier_id' => 5,
                'product_detail_id' => 15
            ],
            [
                'name' => 'Bad Boy EDT',
                'category_id' => 1,
                'supplier_id' => 8,
                'product_detail_id' => 16
            ],
            [
                'name' => 'Ombre Leather EDP',
                'category_id' => 1,
                'supplier_id' => 10,
                'product_detail_id' => 17
            ],
            [
                'name' => 'Gentleman',
                'category_id' => 1,
                'supplier_id' => 9,
                'product_detail_id' => 18
            ],
            [
                'name' => 'Tom Ford Noir EDP',
                'category_id' => 1,
                'supplier_id' => 10,
                'product_detail_id' => 19
            ],
            [
                'name' => 'Eros EDT',
                'category_id' => 1,
                'supplier_id' => 11,
                'product_detail_id' => 20
            ],
            [
                'name' => 'Oud Wood EDP',
                'category_id' => 3,
                'supplier_id' => 10,
                'product_detail_id' => 21
            ],
            [
                'name' => 'Neroli Portofino EDP',
                'category_id' => 3,
                'supplier_id' => 10,
                'product_detail_id' => 22
            ],
            [
                'name' => 'Tobacco Vanille EDP',
                'category_id' => 3,
                'supplier_id' => 10,
                'product_detail_id' => 23
            ],
            [
                'name' => 'Fucking Fabulous EDP',
                'category_id' => 3,
                'supplier_id' => 10,
                'product_detail_id' => 24
            ],
            [
                'name' => 'Tuscan Leather EDP',
                'category_id' => 3,
                'supplier_id' => 10,
                'product_detail_id' => 25
            ],
            [
                'name' => 'Straight to Heaven',
                'category_id' => 3,
                'supplier_id' => 5,
                'product_detail_id' => 26
            ],
            [
                'name' => 'Intoxicated',
                'category_id' => 3,
                'supplier_id' => 5,
                'product_detail_id' => 27
            ],
            [
                'name' => 'Black Phantom',
                'category_id' => 3,
                'supplier_id' => 5,
                'product_detail_id' => 28
            ],
            [
                'name' => 'Musk Oud',
                'category_id' => 3,
                'supplier_id' => 5,
                'product_detail_id' => 29
            ],
            [
                'name' => 'Gold Incense',
                'category_id' => 3,
                'supplier_id' => 7,
                'product_detail_id' => 30
            ],

        ];
        for($i =0; $i<count($products); $i++){
            product::factory()->count(1)
            ->state([
                'name' => $products[$i]['name'],
                'category_id' => $products[$i]['category_id'],
                'supplier_id' => $products[$i]['supplier_id'],
                'product_detail_id' => $products[$i]['product_detail_id'],
            ])
            ->create();
        }
    }
}
