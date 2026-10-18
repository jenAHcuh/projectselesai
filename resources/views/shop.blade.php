@extends('layout.layouts')

@section('title', 'Shop')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('breadcrumb-title', 'Shop')

@section('breadcrumb')
    <span>›</span>
    <span>Shop</span>
@endsection

@section('content')

<div class="shop-container" id="shop-content">

    {{-- ================= SIDEBAR FILTER ================= --}}
    <aside class="shop-sidebar">

        {{-- ================= SEARCH ================= --}}
        <div class="filter-section search-section">

            <form
                method="GET"
                action="{{ route('shop.index') }}"
                class="search-form"
            >

                {{-- Keep current filters --}}
                @foreach(request()->except('search', 'page') as $key => $value)

                    @if(is_array($value))

                        @foreach($value as $item)

                            <input
                                type="hidden"
                                name="{{ $key }}[]"
                                value="{{ $item }}"
                            >

                        @endforeach

                    @else

                        <input
                            type="hidden"
                            name="{{ $key }}"
                            value="{{ $value }}"
                        >

                    @endif

                @endforeach

                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search..."
                    value="{{ request('search') }}"
                >

                <button
                    type="submit"
                    class="search-button"
                >
                    ⌕
                </button>

            </form>

        </div>


        {{-- ================= CATEGORIES ================= --}}
        <details class="filter-dropdown"{{ request('category') ? 'open' : '' }}>

            <summary>
                <span>Categories</span>
                <span class="dropdown-arrow">+</span>
            </summary>

            <div class="filter-content">

                @foreach($categories as $category)

                    <a
                        href="{{ route('shop.index', array_merge(
                            request()->query(),
                            [
                                'category' => $category,
                                'page' => null
                            ]
                        )) }}"

                        class="{{ request('category') === $category ? 'active-filter' : '' }}"
                    >
                        {{ $category }}
                        <span class="filter-count">
                            ({{ \App\Models\Product::where('category', $category)->count() }})
                        </span>
                    </a>

                @endforeach

            </div>

        </details>


        {{-- ================= TAGS ================= --}}
        <details class="filter-dropdown"{{ request('tag') ? 'open' : '' }}>

            <summary>
                <span>Tags</span>
                <span class="dropdown-arrow">+</span>
            </summary>


            <div class="filter-content">

                @foreach($tags as $tag)

                    <a
                        href="{{ route('shop.index', array_merge(
                            request()->query(),
                            [
                                'tag' => $tag,
                                'page' => null
                            ]
                        )) }}"

                        class="{{ request('tag') === $tag ? 'active-filter' : '' }}"
                    >
                        {{ $tag }}
                    </a>

                @endforeach

            </div>

        </details>


        {{-- ================= PRICE RANGE ================= --}}
        <details class="filter-dropdown" {{ request('price_range') ? 'open' : '' }}>

            <summary>
                <span>Price Range</span>
                <span class="dropdown-arrow">+</span>
            </summary>

            <div class="filter-content">

                <a
                    href="{{ route('shop.index', array_merge(
                        request()->query(),
                        [
                            'price_range' => '50_150',
                            'page' => null
                        ]
                    )) }}"

                    class="{{ request('price_range') === '50_150' ? 'active-filter' : '' }}"
                >
                    Rp50.000 to Rp150.000
                </a>


                <a
                    href="{{ route('shop.index', array_merge(
                        request()->query(),
                        [
                            'price_range' => '150_300',
                            'page' => null
                        ]
                    )) }}"

                    class="{{ request('price_range') === '150_300' ? 'active-filter' : '' }}"
                >
                    Rp150.000 to Rp300.000
                </a>


                <a
                    href="{{ route('shop.index', array_merge(
                        request()->query(),
                        [
                            'price_range' => 'above_300',
                            'page' => null
                        ]
                    )) }}"

                    class="{{ request('price_range') === 'above_300' ? 'active-filter' : '' }}"
                >
                    Rp300.000 & Above
                </a>

            </div>

        </details>


        {{-- ================= CLEAR FILTER ================= --}}
        @if(request()->hasAny([
            'search',
            'category',
            'tag',
            'price_range',
            'sort'
        ]))

            <a
                href="{{ route('shop.index') }}"
                class="clear-filter"
            >
                Clear All Filters
            </a>

        @endif

    </aside>


    {{-- ================= PRODUCT AREA ================= --}}
    <main class="product-area">

        {{-- Toolbar --}}
        <div class="product-toolbar">

            <span>
                Showing
                {{ $products->firstItem() ?? 0 }}
                –
                {{ $products->lastItem() ?? 0 }}
                of
                {{ $products->total() }}
                results
            </span>


            {{-- ================= SORT DROPDOWN ================= --}}
            <div class="sort-dropdown">

                <div class="sort-trigger">

                    <span>
                        Sort by Price:

                        <strong>
                            @if(request('sort') === 'high')
                                High To Low
                            @else
                                Low To High
                            @endif
                        </strong>
                    </span>

                    <span class="arrow"></span>
                    

                </div>


                <div class="sort-content">

                    {{-- Low To High --}}
                    <a
                        href="{{ route('shop.index', array_merge(
                            request()->query(),
                            [
                                'sort' => 'low',
                                'page' => null
                            ]
                        )) }}"
                        class="{{ request('sort', 'low') === 'low' ? 'active-sort' : '' }}"
                    >
                        Low To High
                    </a>


                    {{-- High To Low --}}
                    <a
                        href="{{ route('shop.index', array_merge(
                            request()->query(),
                            [
                                'sort' => 'high',
                                'page' => null
                            ]
                        )) }}"
                        class="{{ request('sort') === 'high' ? 'active-sort' : '' }}"
                    >
                        High To Low
                    </a>

                </div>

            </div>

        </div>


        {{-- ================= PRODUCT GRID ================= --}}
        <div class="product-grid">

            @foreach($products as $product)

                <div class="product-card">

                    {{-- ================= PRODUCT IMAGE ================= --}}
                    <div class="product-image">

                        {{-- ================= FAKE SCARCITY ================= --}}
                        @php

                            /*
                            * Hanya product tertentu
                            * yang mendapatkan scarcity badge.
                            */

                            $fakeScarcity = [
                                1 => 3,
                                4 => 2,
                                7 => 4,
                            ];

                        @endphp

                        @if(isset($fakeScarcity[$product->id]))

                            <span class="urgency-badge">
                                ONLY {{ $fakeScarcity[$product->id] }} LEFT!
                            </span>

                        @endif


                        {{-- Product Image --}}
                        <img 
                            src="{{ asset($product->image) }}" 
                            alt="{{ $product->name }}" 
                        >

                        {{-- ================= HOVER ACTIONS ================= --}}
                        <div class="product-actions">

                            {{-- Product Detail --}}
                            <a 
                                href="{{ route(
                                    'products.show',
                                    $product->slug
                                ) }}"
                                class="action-btn"
                                title="View Product"
                            >
                                ⌕
                            </a>

                        </div>

                    </div> {{-- TUTUP product-image --}}

                    @php
                        $urgencyClass = '';

                        if ($product->sold_percentage >= 80 || $product->time_left <= 1) {
                            $urgencyClass = 'urgency-critical';
                        } elseif ($product->sold_percentage >= 60 || $product->time_left <= 3) {
                            $urgencyClass = 'urgency-warning';
                        }
                    @endphp

                        {{-- ================= SOLD / URGENCY INFO ================= --}}
                        <div class="scarcity-info  {{ $urgencyClass }}">

                            <span class="sold-count">
                                𖤘 {{ $product->sold_count }} Sold
                            </span>

                            <span class="time-left">
                                ◷ {{ $product->time_left }}d Left
                            </span>

                        </div>

                        <div class="sold-progress">

                            <div 
                                 class="sold-progress-fill  {{ $urgencyClass }}"
                                style="--progress: {{ $product->sold_percentage }}%;"
                            ></div>

                        </div>


                        {{-- Product Name --}}
                        <div class="product-name">
                            {{ $product->name }}
                        </div>


                        {{-- ================= PRODUCT INFO ================= --}}
                        <div class="product-info">

                            {{-- ================= PRICE ================= --}}
                            <div class="product-price">

                                <span class="current-price">
                                    Rp{{ number_format(
                                        $product->price,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </span>

                                @if($product->original_price)

                                    <span class="original-price">
                                        Rp{{ number_format(
                                            $product->original_price,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </span>

                                    @php

                                        $discount = round(
                                            (
                                                (
                                                    $product->original_price
                                                    -
                                                    $product->price
                                                )
                                                /
                                                $product->original_price
                                            )
                                            * 100
                                        );

                                    @endphp

                                    <span class="discount">
                                        Save {{ $discount }}%
                                    </span>

                                @endif

                            </div>


                            {{-- RATING --}}
                                <div class="rating">
                                    <span class="rating-stars">
                                        <span class="filled-stars">★★★★</span><span class="empty-star">★</span>
                                    </span>

                                    <span class="review-count">
                                        ({{ $product->review_count ?? 0 }} reviews)
                                    </span>
                                </div>

                        </div>
                </div>

            @endforeach

        </div>


        {{-- ================= PAGINATION ================= --}}
       
@if ($products->hasPages())
    <div class="pagination-wrapper">
        @if ($products->onFirstPage())
            <span class="page-link disabled"></span>
        @else
            <a href="{{ $products->previousPageUrl() }}" class="page-link"></a>
        @endif

        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            @if ($page == $products->currentPage())
                <span class="page-link active">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
            @endif
        @endforeach

        @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="page-link"></a>
        @else
            <span class="page-link disabled"></span>
        @endif
    </div>
@endif


    </main>

</div>

@endsection

@section('page-js')
    <script src="{{ asset('js/shop.js') }}"></script>
@endsection
