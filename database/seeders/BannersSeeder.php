<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'title' => 'New collection',
            'description' => 'Lazy Perfume',
            'user_id' => '3',
            'homeBanner' => true,
            'banner' => 'video-header.mp4',
            'type' => 'video',
        ]);
        Banner::create([
            'title' => 'Nước hoa nam',
            'user_id' => '3',
            'thumbnail1' => true,
            'banner' => 'for-him.jpg',
        ]);
        Banner::create([
            'title' => 'Nước hoa nữ',
            'user_id' => '3',
            'thumbnail2' => true,
            'banner' => 'for-her.jpg',
        ]);
    }
}
