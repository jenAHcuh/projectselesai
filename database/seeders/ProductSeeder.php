<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $cottonBlazer = Product::create([
            'name' => 'Cotton Blazer',
            'slug' => 'cotton-blazer',

            'price' => 350000,
            'original_price' => 750000,

            'image' => 'images/products/product-1.jpg',

            'short_description' =>
                'A lightweight cotton blazer designed for everyday wear.',

            'description' =>
                'This cotton blazer features a comfortable and lightweight design suitable for everyday wear. The clean silhouette provides a modern appearance while maintaining comfort throughout the day.',

            'material' =>
                '100% Cotton',

            'category' => 'Clothes',
            'tags' => 'Clothes, Casual, Blazer',

            'rating' => 4.5,
            'review_count' => 5,
            'sold_count' => 294,
            'sold_percentage' => 75,
            'time_left' => 3,
        ]);

        $cottonBlazer->variants()->createMany([
            [
                'size' => 'S',
            ],
            [
                'size' => 'M',
            ],
            [
                'size' => 'L',
            ],
            [
                'size' => 'XL',
            ],
        ]);


        $anorak = Product::create([
            'name' => 'Hooded Thermal Anorak',
            'slug' => 'hooded-thermal-anorak',

            'price' => 270000,
            'original_price' => 700000,

            'image' => 'images/products/product-2.jpg',

            'short_description' =>
                'Coat with quilted lining and an adjustable hood.',

            'description' =>
                'Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening with placket.',

            'material' =>
                'Polyester',

            'category' => 'Clothes',
            'tags' => 'Clothes, Outerwear, Jacket',

            'rating' => 4.5,
            'review_count' => 5,
            'sold_count' => 128,
            'sold_percentage' => 60,
            'time_left' => 2,

        ]);

        $anorak->variants()->createMany([
            [
                'size' => 'S',

            ],
            [
                'size' => 'M',

            ],
            [
                'size' => 'L',

            ],
            [
                'size' => 'XL',

            ],
        ]);

        // Product 3
$linenShirt = Product::create([
    'name' => 'Linen Casual Shirt',
    'slug' => 'linen-casual-shirt',
    'price' => 180000,
    'original_price' => 350000,
    'image' => 'images/products/product-3.jpg',
    'short_description' => 'A breathable linen shirt for casual occasions.',
    'description' => 'This linen casual shirt offers a lightweight and breathable design. Its relaxed fit and clean silhouette make it suitable for everyday wear, weekend outings, and casual gatherings.',
    'material' => 'Linen',
    'category' => 'Clothes',
    'tags' => 'Clothes, Casual, Shirt',
    'rating' => 4.7,
    'review_count' => 12,
    'sold_count' => 185,
    'sold_percentage' => 65,
    'time_left' => 4,
]);

$linenShirt->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 4
$denimJacket = Product::create([
    'name' => 'Classic Denim Jacket',
    'slug' => 'classic-denim-jacket',
    'price' => 320000,
    'original_price' => 580000,
    'image' => 'images/products/product-4.jpg',
    'short_description' => 'A timeless denim jacket with a versatile design.',
    'description' => 'This classic denim jacket features a structured silhouette, button-front closure, and practical pockets. Designed for layering, it pairs easily with casual outfits throughout the year.',
    'material' => '100% Cotton',
    'category' => 'Clothes',
    'tags' => 'Clothes, Denim, Jacket',
    'rating' => 4.6,
    'review_count' => 18,
    'sold_count' => 342,
    'sold_percentage' => 80,
    'time_left' => 2,
]);

$denimJacket->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 5
$knitSweater = Product::create([
    'name' => 'Ribbed Knit Sweater',
    'slug' => 'ribbed-knit-sweater',
    'price' => 220000,
    'original_price' => 420000,
    'image' => 'images/products/product-5.jpg',
    'short_description' => 'A soft ribbed sweater for comfortable daily styling.',
    'description' => 'This ribbed knit sweater combines a soft texture with a comfortable fit. Its minimalist design makes it easy to layer over shirts or wear on its own during cooler days.',
    'material' => 'Cotton Blend',
    'category' => 'Clothes',
    'tags' => 'Clothes, Knitwear, Sweater',
    'rating' => 4.4,
    'review_count' => 9,
    'sold_count' => 156,
    'sold_percentage' => 55,
    'time_left' => 5,
]);

$knitSweater->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 6
$wideLegTrousers = Product::create([
    'name' => 'Wide Leg Trousers',
    'slug' => 'wide-leg-trousers',
    'price' => 240000,
    'original_price' => 450000,
    'image' => 'images/products/product-6.jpg',
    'short_description' => 'Modern wide-leg trousers with a relaxed fit.',
    'description' => 'These wide-leg trousers feature a relaxed silhouette and a clean finish. Designed for versatility, they can be styled with casual tops or formal shirts for different occasions.',
    'material' => 'Polyester Blend',
    'category' => 'Clothes',
    'tags' => 'Clothes, Trousers, Casual',
    'rating' => 4.8,
    'review_count' => 21,
    'sold_count' => 276,
    'sold_percentage' => 70,
    'time_left' => 3,
]);

$wideLegTrousers->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 7
$oversizedTshirt = Product::create([
    'name' => 'Oversized Cotton T-Shirt',
    'slug' => 'oversized-cotton-t-shirt',
    'price' => 95000,
    'original_price' => 180000,
    'image' => 'images/products/product-7.jpg',
    'short_description' => 'A relaxed cotton T-shirt for everyday comfort.',
    'description' => 'This oversized cotton T-shirt features a relaxed fit and a simple design. Made for everyday comfort, it works well with jeans, trousers, shorts, and layered outfits.',
    'material' => '100% Cotton',
    'category' => 'Clothes',
    'tags' => 'Clothes, T-Shirt, Casual',
    'rating' => 4.5,
    'review_count' => 32,
    'sold_count' => 518,
    'sold_percentage' => 90,
    'time_left' => 1,
]);

$oversizedTshirt->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 8
$pleatedSkirt = Product::create([
    'name' => 'Pleated Midi Skirt',
    'slug' => 'pleated-midi-skirt',
    'price' => 195000,
    'original_price' => 380000,
    'image' => 'images/products/product-8.jpg',
    'short_description' => 'An elegant pleated skirt with a flowing silhouette.',
    'description' => 'This pleated midi skirt features a flowing shape and elegant pleats. Its versatile design makes it suitable for office outfits, casual occasions, and weekend styling.',
    'material' => 'Polyester',
    'category' => 'Clothes',
    'tags' => 'Clothes, Skirt, Elegant',
    'rating' => 4.6,
    'review_count' => 14,
    'sold_count' => 203,
    'sold_percentage' => 60,
    'time_left' => 4,
]);

$pleatedSkirt->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 9
$hoodie = Product::create([
    'name' => 'Essential Zip-Up Hoodie',
    'slug' => 'essential-zip-up-hoodie',
    'price' => 260000,
    'original_price' => 490000,
    'image' => 'images/products/product-9.jpg',
    'short_description' => 'A versatile zip-up hoodie with a comfortable fit.',
    'description' => 'This essential zip-up hoodie features a practical front zipper, an adjustable hood, and a relaxed fit. Ideal for layering, it offers a casual look for everyday activities.',
    'material' => 'Cotton Polyester Blend',
    'category' => 'Clothes',
    'tags' => 'Clothes, Hoodie, Casual',
    'rating' => 4.7,
    'review_count' => 26,
    'sold_count' => 391,
    'sold_percentage' => 85,
    'time_left' => 2,
]);

$hoodie->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 10
$chinoShorts = Product::create([
    'name' => 'Slim Fit Chino Shorts',
    'slug' => 'slim-fit-chino-shorts',
    'price' => 145000,
    'original_price' => 280000,
    'image' => 'images/products/product-10.jpg',
    'short_description' => 'Lightweight chino shorts with a modern slim fit.',
    'description' => 'These slim fit chino shorts offer a clean silhouette and lightweight construction. Featuring a classic design, they are a practical choice for warm weather and casual outings.',
    'material' => 'Cotton Twill',
    'category' => 'Clothes',
    'tags' => 'Clothes, Shorts, Casual',
    'rating' => 4.3,
    'review_count' => 11,
    'sold_count' => 167,
    'sold_percentage' => 50,
    'time_left' => 6,
]);

$chinoShorts->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 11
$trenchCoat = Product::create([
    'name' => 'Classic Trench Coat',
    'slug' => 'classic-trench-coat',
    'price' => 450000,
    'original_price' => 850000,
    'image' => 'images/products/product-11.jpg',
    'short_description' => 'A sophisticated trench coat for versatile layering.',
    'description' => 'This classic trench coat features a structured silhouette and timeless styling. Designed for layering over everyday outfits, it adds a polished appearance for work and special occasions.',
    'material' => 'Polyester Cotton Blend',
    'category' => 'Clothes',
    'tags' => 'Clothes, Outerwear, Coat',
    'rating' => 4.9,
    'review_count' => 16,
    'sold_count' => 98,
    'sold_percentage' => 45,
    'time_left' => 3,
]);

$trenchCoat->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);

// Product 12
$basicPolo = Product::create([
    'name' => 'Basic Cotton Polo Shirt',
    'slug' => 'basic-cotton-polo-shirt',
    'price' => 135000,
    'original_price' => 260000,
    'image' => 'images/products/product-12.jpg',
    'short_description' => 'A classic cotton polo shirt for smart casual outfits.',
    'description' => 'This basic cotton polo shirt features a traditional collar, short sleeves, and a comfortable fit. Its simple design makes it suitable for everyday wear and smart casual occasions.',
    'material' => 'Cotton Blend',
    'category' => 'Clothes',
    'tags' => 'Clothes, Polo, Smart Casual',
    'rating' => 4.5,
    'review_count' => 19,
    'sold_count' => 245,
    'sold_percentage' => 68,
    'time_left' => 5,
]);

$basicPolo->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);
// Product 13
$corduroyJacket = Product::create([
    'name' => 'Corduroy Button Jacket',
    'slug' => 'corduroy-button-jacket',

    'price' => 285000,
    'original_price' => 520000,

    'image' => 'images/products/product-13.jpg',

    'short_description' =>
        'A stylish corduroy jacket with a timeless button-up design.',

    'description' =>
        'This corduroy button jacket features a textured finish, a classic collar, and a front button closure. Its relaxed silhouette makes it ideal for layering over casual outfits during cooler days.',

    'material' =>
        'Cotton Corduroy',

    'category' => 'Clothes',
    'tags' => 'Clothes, Jacket, Casual',

    'rating' => 4.6,
    'review_count' => 17,
    'sold_count' => 213,
    'sold_percentage' => 65,
    'time_left' => 3,
]);

$corduroyJacket->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);


// Product 14
$straightLegJeans = Product::create([
    'name' => 'Straight Leg Denim Jeans',
    'slug' => 'straight-leg-denim-jeans',

    'price' => 210000,
    'original_price' => 390000,

    'image' => 'images/products/product-14.jpg',

    'short_description' =>
        'Classic straight-leg jeans designed for everyday comfort.',

    'description' =>
        'These straight-leg denim jeans feature a classic five-pocket design, a comfortable mid-rise waist, and a versatile straight-leg silhouette. Easy to pair with T-shirts, shirts, and jackets, they are suitable for everyday wear.',

    'material' =>
        '98% Cotton, 2% Elastane',

    'category' => 'Clothes',
    'tags' => 'Clothes, Jeans, Denim, Casual',

    'rating' => 4.8,
    'review_count' => 24,
    'sold_count' => 356,
    'sold_percentage' => 80,
    'time_left' => 2,
]);

$straightLegJeans->variants()->createMany([
    ['size' => 'S'],
    ['size' => 'M'],
    ['size' => 'L'],
    ['size' => 'XL'],
]);
    }
}