<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;


class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandNames = [
            'Creed',
            'guerlain',
            'amouage',
            'nasomatto',
            'kilian',
            'christian dior',
            'diptyque',
            'jo malone',
            'lelabo',
            'tom ford',
            'versace',
            'maison margiela',
        ];
        for($i=0; $i< count($brandNames); $i++){
            Supplier::factory()->count(1)
            ->state([
                'logo' => 'brand'.($i+1).'.png',
                'name' => $brandNames[$i],
            ])
            ->create();
        }
    }
}
