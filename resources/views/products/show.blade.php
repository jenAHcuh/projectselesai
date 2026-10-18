@extends('layout.layouts')

@section('title', $product->name)

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endsection

@section('breadcrumb-title')
    <span>{{ $product->name }}</span>
@endsection

@section('breadcrumb')
    <span>›</span>

    <a href="{{ route('shop.index') }}">
        Shop
    </a>

    <span>›</span>

    <span>{{ $product->name }}</span>
@endsection

@section('content')

@php
    $price = (float) $product->price;
    $originalPrice = (float) ($product->original_price ?? 0);
    $hasDiscount = $originalPrice > $price && $price > 0;

    $discount = $hasDiscount
        ? round((($originalPrice - $price) / $originalPrice) * 100)
        : 0;
@endphp

{{-- PRODUCT DETAIL --}}
<section class="product-detail">

    {{-- LEFT: PRODUCT IMAGE --}}
    <div class="product-gallery">
        <div class="product-main-image">
            @if ($product->image)
                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                >
            @endif
        </div>
    </div>

    {{-- RIGHT: PRODUCT INFORMATION --}}
    <div class="product-information">

        <h1>{{ $product->name }}</h1>

        {{-- DESCRIPTION --}}
        <p class="short-description">
            {{ $product->short_description }}
        </p>

{{-- RATING --}}
<div class="rating">
    <span class="rating-stars">
        <span class="filled-stars">★★★★</span><span class="empty-star">★</span>
    </span>

    <span class="review-count">
        ({{ $product->review_count ?? 0 }} reviews)
    </span>
</div>

        {{-- PRICE --}}
        <div class="product-price">
            @if ($hasDiscount)
                <span class="original-price">
                    Rp{{ number_format($originalPrice, 0, ',', '.') }}
                </span>
            @endif

            <span class="current-price">
                Rp{{ number_format($price, 0, ',', '.') }}
            </span>

            @if ($hasDiscount)
                <span class="discount-badge">
                    Save {{ $discount }}%
                </span>
            @endif
        </div>


        {{-- OPTIONAL ADD-ON --}}

{{-- PRODUCT PROTECTION --}}

{{-- PRODUCT PROTECTION --}}
<div class="order-protection">
    <strong class="protection-heading">Enhance Your Order</strong>

    <label class="protection-content">
        <input
            type="checkbox"
            name="product_protection"
            id="protectionToggle"
            value="1"
            checked
        >

        <span class="protection-checkbox">
            <span class="protection-checkmark">✓</span>
        </span>

        <span class="protection-info">
            <strong>Add Product Protection — Rp10.000</strong>
            <small>
                Covers accidental drops, cracks &amp; priority replacement shipping. Recommended.
            </small>
        </span>
    </label>
</div>



        

        {{-- SIZE --}}
        <div class="option">
            <label>SELECT SIZE</label>

            <div class="size-options">
                @foreach ($product->variants->pluck('size')->unique() as $size)
                    <button type="button" class="size-button">
                        {{ $size }}
                    </button>
                @endforeach
            </div>
        </div>

        

        {{-- ADD TO CART --}}
        
<form action="{{ route('cart.add', $product->slug) }}" method="POST">
    @csrf

    <div class="product-quantity">
        <label for="quantity">Quantity</label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            value="1"
            min="1"
            required
        >
    </div>

    <button type="submit" class="add-to-cart-button">
        ADD TO CART
    </button>
</form>

    </div>
</section>

{{-- PRODUCT SPECIFICATIONS --}}
<section class="product-description">
    <h2>Product Specifications</h2>

    <div class="specification-row">
        <span>Material</span>
        <p>{{ $product->material ?: 'Not specified' }}</p>
    </div>

    <div class="specification-row">
        <span>Category</span>
        <p>{{ $product->category ?: 'Not specified' }}</p>
    </div>

    <div class="specification-row">
        <span>Description</span>
        <p>{{ $product->description ?: $product->short_description }}</p>
    </div>

    <div class="specification-row">
        <span>Tags</span>
        <p>{{ $product->tags ?: 'Not specified' }}</p>
    </div>
</section>

@endsection

@section('page-js')
    <script src="{{ asset('js/show.js') }}"></script>
@endsection