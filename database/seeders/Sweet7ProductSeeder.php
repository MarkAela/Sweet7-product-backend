<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class Sweet7ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Evermore Bloom Cake',
                'product_price' => 1500,
                'category' => 'Specialty Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSR3fj-VIxOoRVWJAVFYMPKbQSxsSqtaMh-bCTsddeHEQ&s=10',
                'product_description' => 'A beautiful floral-inspired cake perfect for special celebrations.',
            ],
            [
                'product_name' => 'Rose Cake',
                'product_price' => 1200,
                'category' => 'Specialty Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxUTCPGWuk1c0cQnXbv1TRqMsLQ3Q3Ul7bNOf8QXAJAA&s=10',
                'product_description' => 'An elegant cake decorated with delicate rose designs.',
            ],
            [
                'product_name' => 'Midnight Velvet Cake',
                'product_price' => 1350,
                'category' => 'Chocolate Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuNFX8bi-YtjGDRFmXUNulVsSdcmJgsjNfCOYsrd6HFg&s=10',
                'product_description' => 'A rich and velvety chocolate cake for chocolate lovers.',
            ],
            [
                'product_name' => 'Ivory Bless Cake',
                'product_price' => 1400,
                'category' => 'Specialty Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKmvPP0zbDvbDdPjVZX-0SJs0ZQYPc3EFLCo_uIILCQg&s=10',
                'product_description' => 'A graceful ivory cake perfect for meaningful occasions.',
            ],
            [
                'product_name' => 'Classic Tiramisu Cake',
                'product_price' => 1100,
                'category' => 'Specialty Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxu8d_d06BzVFJlsw0gCskgu2cnSkk5DCETox4I_Mrlw&s=10',
                'product_description' => 'A delicious coffee-flavored cake inspired by classic tiramisu.',
            ],
            [
                'product_name' => 'Red Velvet Cake',
                'product_price' => 1250,
                'category' => 'Velvet Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTirqJiKXI035q74dibPwRR1jQX2D-KioPBNszVLKr_gw&s=10',
                'product_description' => 'A soft red velvet cake with smooth and creamy frosting.',
            ],
            [
                'product_name' => 'Blackforest Cake',
                'product_price' => 1150,
                'category' => 'Chocolate Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ81gIu3BWr4osqImgVly4g-3O3ckVz8IsZ25ZsPv69Lg&s=10',
                'product_description' => 'A classic chocolate cake layered with cream and cherries.',
            ],
            [
                'product_name' => 'Strawberry Cake',
                'product_price' => 1050,
                'category' => 'Fruit Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR2EPo0d8M19ZUeAufVfg2Jmv5ws0Ri24xuc7220rOKA&s=10',
                'product_description' => 'A sweet and refreshing cake with strawberry flavor.',
            ],
            [
                'product_name' => 'Blueberry Cake',
                'product_price' => 1100,
                'category' => 'Fruit Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1fU62UGGWaxyZ1mp80Ik8pXUHXV4CyzhjO1usKt2W0A&s=10',
                'product_description' => 'A soft and delicious cake with a sweet blueberry flavor.',
            ],
            [
                'product_name' => 'Banana Cake',
                'product_price' => 850,
                'category' => 'Fruit Cakes',
                'product_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQO7Uk-TjmhIj5Uyc9qBQHdjXLzllu5VzfUNbEa9rfgSA&s=10',
                'product_description' => 'A moist and flavorful banana cake, perfect for any occasion.',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                [
                    'product_name' => $product['product_name'],
                    'seller_id' => 2,
                ],
                array_merge($product, [
                    'seller_id' => 2,
                ])
            );
        }
    }
}
