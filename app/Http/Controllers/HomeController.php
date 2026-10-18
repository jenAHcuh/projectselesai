<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index()
    {
        // Produk untuk Flash Sale
        $products = Product::latest()
            ->take(4)
            ->get();

        // Produk untuk Carousel
        $carouselProducts = $this->getCarouselProducts();

        return view('home', compact('products', 'carouselProducts'));
    }

    private function getCarouselProducts()
    {
        return Product::inRandomOrder()
            ->take(8)
            ->get();
    }
}
