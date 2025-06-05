<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Gấu nhồi bông cho bé ôm ngủ đáng yêu',
                'price' => 270000,
                'image' => 'assets/img/product1.png',
                'description' => 'Gấu bông mềm mại, thích hợp cho bé ôm ngủ mỗi tối.'
            ],
            [
                'name' => 'Gấu bông Shiba đầu to thân nhỏ',
                'price' => 320000,
                'image' => 'assets/img/product2.png',
                'description' => 'Chú chó Shiba với tỉ lệ ngộ nghĩnh, cực kỳ dễ thương.'
            ],
            [
                'name' => 'Gấu bông ôm búp bê',
                'price' => 300000,
                'image' => 'assets/img/product3.png',
                'description' => 'Gấu bông đáng yêu ôm búp bê nhỏ xinh, phù hợp làm quà tặng.'
            ],
            [
                'name' => 'Gà vô tri Kichi Hihi',
                'price' => 380000,
                'image' => 'assets/img/product4.png',
                'description' => 'Món đồ chơi hot trend với tạo hình gà cực hài hước.'
            ],
            [
                'name' => 'Gấu bông Hải Ly Loopy Cosplay',
                'price' => 320000,
                'image' => 'assets/img/product5.png',
                'description' => 'Hải ly Loopy hóa trang siêu đáng yêu, chất liệu nhung cao cấp.'
            ],
            [
                'name' => 'Gấu bông chuột lang nước cõng rùa Capypara',
                'price' => 360000,
                'image' => 'assets/img/product6.png',
                'description' => 'Chuột lang Capypara cõng rùa cực yêu, món quà độc đáo.'
            ],
            [
                'name' => 'Gấu trúc trong ống tre Tori Panda',
                'price' => 280000,
                'image' => 'assets/img/product7.png',
                'description' => 'Gấu trúc nhỏ chui trong ống tre, thiết kế lạ mắt.'
            ],
            [
                'name' => 'Cặp đôi heo hồng Wedding Pig',
                'price' => 260000,
                'image' => 'assets/img/product8.png',
                'description' => 'Cặp heo hồng tình nhân cực xinh, phù hợp tặng người yêu.'
            ],
            [
                'name' => 'Bé cừu béo Shaun The Sheep',
                'price' => 190000,
                'image' => 'assets/img/product9.png',
                'description' => 'Cừu béo dễ thương, size nhỏ gọn, cực kỳ mềm mịn.'
            ],
            [
                'name' => 'Mèo Lucifer mặt quạo',
                'price' => 560000,
                'image' => 'assets/img/product10.png',
                'description' => 'Mèo Lucifer với gương mặt “khó ở” nhưng cực kỳ hot.'
            ],
            [
                'name' => 'Khủng long Nisa baby',
                'price' => 220000,
                'image' => 'assets/img/product11.png',
                'description' => 'Khủng long Nisa baby đáng yêu với màu sắc pastel dịu nhẹ.'
            ],
            [
                'name' => 'Gấu bông ủ tay kèm chăn Lotso cao cấp 3 in 1',
                'price' => 430000,
                'image' => 'assets/img/product12.png',
                'description' => 'Lotso 3 trong 1: chăn, gối và gấu bông – tiện lợi và xịn xò.'
            ],
        ]);
    }
}
