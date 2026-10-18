@extends('layout.layouts')

@section('title', 'home')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home-slider">
    <section class="hero-slide active">
        <div class="hero-content">
            <span class="eyebrow">SUMMER COLLECTION</span>

            <h1>
                Fall - Winter<br>
                Collections 2030
            </h1>

            <p>
                A specialist label creating luxury essentials.
                Ethically crafted with an unwavering commitment
                to exceptional quality.
            </p>

            <a href="{{ route('shop.index') }}" class="shop-button">
                SHOP NOW <span>→</span>
            </a>

        </div>
    </section>
</div>


{{-- INSTAGRAM SECTION --}}
<section class="instagram-section">
    <div class="instagram-container">

        {{-- 6 FOTO INSTAGRAM --}}
       
<div class="instagram-gallery">
    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-1.jpg') }}"
             alt="Fashion accessories" loading="lazy">
    </div>

    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-2.jpg') }}"
             alt="Clothing collection" loading="lazy">
    </div>

    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-3.jpg') }}"
             alt="Interior collection" loading="lazy">
    </div>

    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-4.jpg') }}"
             alt="Clothing rack" loading="lazy">
    </div>

    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-5.jpg') }}"
             alt="Fashion bag" loading="lazy">
    </div>

    <div class="instagram-photo">
        <img src="{{ asset('images/instagram/instagram-6.jpg') }}"
             alt="Fashion lifestyle" loading="lazy">
    </div>
</div>


        {{-- INSTAGRAM TEXT --}}
        <div class="instagram-text">
            <h2>Style Made Simple.</h2>

            <p>
                Explore a curated collection of timeless pieces made to complement your everyday wardrobe. 
                Embrace neutral tones, effortless combinations,
                and understated details that make every outfit feel uniquely yours
            </p>

            <h3>#EffortlessStyle</h3>
        </div>

    </div>
</section>




{{-- FLASH SALE: TIMER + PRODUCTS DALAM SATU SECTION --}}
<section class="sale-countdown">

    {{-- TIMER --}}
    <div class="countdown-banner">

    <div class="countdown-info">
        <h3>Flash Sale Ends!</h3>
        <p>Don't miss our special offers!</p>
    </div>

    <div class="countdown-timer" id="homeCountdown">
        <div class="countdown-item">
            <strong id="saleDays">03</strong>
            <span>Days</span>
        </div>

        <span class="countdown-colon">:</span>

        <div class="countdown-item">
            <strong id="saleHours">00</strong>
            <span>Hours</span>
        </div>

        <span class="countdown-colon">:</span>

        <div class="countdown-item">
            <strong id="saleMinutes">00</strong>
            <span>Minutes</span>
        </div>

        <span class="countdown-colon">:</span>

        <div class="countdown-item">
            <strong id="saleSeconds">00</strong>
            <span>Seconds</span>
        </div>
    </div>
    </div>

    {{-- PRODUCT DISPLAY: MASIH DI DALAM SALE-COUNTDOWN --}}
    <div class="flash-sale-products">
        
        <div class="flash-sale-header">
            <div class="flash-sale-heading">
                <p>A curated selection of our seasonal favorites</p>
                <h2>Most Popular Right Now</h2>
            </div>

            <a href="{{ route('shop.index') }}" class="view-all-clothes">
                View All Clothing <span>→</span>
            </a>
        </div>

        <div class="flash-sale-grid">
            @forelse ($products as $product)
                @php
                    $price = (float) $product->price;
                    $originalPrice = (float) ($product->original_price ?? 0);
                    $hasDiscount = $originalPrice > $price && $price > 0;
                    $rating = max(0, min(5, (int) round($product->rating ?? 0)));
                @endphp

                <article class="flash-product-card">
                    
                    

                        <div class="flash-product-image">
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}"
                                     alt="{{ $product->name }}"
                                     loading="lazy">
                            @endif
                            <div class="product-actions">
                                <a
                                    href="{{ route('products.show', $product->slug) }}"
                                    class="action-btn"
                                    title="View Product"
                                    aria-label="View {{ $product->name }}"
                                >
                                    ⌕
                                </a>
                            </div>

                        </div>

                        <span class="flash-product-name">
                            {{ $product->name }}
                        </span>
                    

                    <div class="flash-product-prices">
                        <span class="flash-product-price">
                            Rp{{ number_format($price, 0, ',', '.') }}
                        </span>

                        @if ($hasDiscount)
                            <span class="flash-product-original">
                                Rp{{ number_format($originalPrice, 0, ',', '.') }}
                            </span>
                        @endif
                        @if ($hasDiscount)
    @php
        $discount = round(
            (($originalPrice - $price) / $originalPrice) * 100
        );
    @endphp

    <span class="discount">
        Save {{ $discount }}%
    </span>
@endif
                    </div>
                </article>
            @empty
                <p>Belum ada produk untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>

</section>


{{-- BOTTOM COLLECTION BANNER --}}
<section class="bottom-collection-banner">
    <div class="bottom-collection-overlay">
        <div class="bottom-collection-content">
            <span class="bottom-collection-eyebrow">
                DISCOVER YOUR STYLE
            </span>

            <h2>Timeless Style, Everyday Comfort</h2>

            <p>
                Discover wardrobe essentials designed for every occasion.
            </p>

            <a href="{{ route('shop.index') }}" class="bottom-collection-button">
                SHOP COLLECTION <span>→</span>
            </a>
        </div>
    </div>
</section>



@endsection

@section('page-js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
