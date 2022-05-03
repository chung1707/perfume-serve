<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'email' => 'user@perfume.com',
            'phone' => '98765432100',
            'address' => '2362 Aoma Rapid Jakubowskiton, PA 29565-0803',
            'role_id' => 1,
            'password' => Hash::make('user1234'),
            'province_id' => 1,
            'district_id' => 15,
            'ward_id' => 230,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@perfume.com',
            'phone' => '9876543211',
            'address' => '2362 Lazada Rapid Jakubowskiton, PA 29565-0803',
            'role_id' => 2,
            'password' => Hash::make('admin123'),
            'province_id' => 1,
            'district_id' => 15,
            'ward_id' => 230,
        ]);
        User::factory()->count(30)->create();
    }
}
