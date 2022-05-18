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
            'phone' => '987654321002',
            'address' => '2362 Aoma Rapid Jakubowskiton, PA 29565-0803',
            'role_id' => 2,
            'password' => Hash::make('user1234'),
            'avatar' => 'avatar.png',
        ]);

        User::create([
            'name' => 'employee',
            'email' => 'employee@perfume.com',
            'phone' => '98765432110',
            'address' => '2362 Lazada Rapid Jakubowskiton, PA 29565-0803',
            'role_id' => 3,
            'password' => Hash::make('employee123'),
            'avatar' => 'avatar.png',
            'position' => 'Nhân viên bán hàng',
            'wage' => '7000000',
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@perfume.com',
            'phone' => '98765432111',
            'address' => '2362 Lazada Rapid Jakubowskiton, PA 29565-0803',
            'role_id' => 1,
            'password' => Hash::make('admin123'),
            'avatar' => 'avatar.png',
            'position' => 'Quản lý cửa hàng',
        ]);
        User::factory()->count(30)->create();
    }
}
