<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Policy::create([
            'title' => 'Sản phẩm chính hãng',
            'content' => 'Sản phẩm nước hoa được mua trực tiếp tại store ở Pháp, cam kết chính hãng. Đổi trả trong vòng 7 ngày từ khi nhận được hàng.',
            'user_id' => '3',
            'logo' => 'policy2.svg',
        ]);
        Policy::create([
            'title' => 'Chính sách vận chuyển',
            'content' => 'Lazy Perfume áp dụng freeship cho tất cả các khách hàng trên toàn quốc. chúng tôi chưa áp dụng hình thức giao hàng quốc tế tại thời điểm này.',
            'user_id' => '3',
            'logo' => 'policy1.svg',
        ]);
        Policy::create([
            'title' => 'Thành viên thân thiết',
            'content' => 'thành viên vàng sẽ được giảm 5% / đơn hàng. với thành viên bạc khách được giảm 3% / đơn hàng.',
            'user_id' => '3',
            'logo' => 'policy3.svg',
        ]);
    }
}
