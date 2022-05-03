<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Picture;

class PicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Each product has 2 photos. total 30 product
        $imgCurent = 1;
        $totalProducts = 30;
        for($i =1; $i <= $totalProducts; $i = $i + 1){
            Picture::create([
                'img' => 'product'.$imgCurent.'.jpg',
                'product_id' => $i,
            ]);
            Picture::create([
                'img' => 'product'.($imgCurent+1).'.jpg',
                'product_id' => $i,
            ]);
            $imgCurent+=2;
        }
    }
}
