<header class="site-header">

    {{-- ================= TOP BAR ================= --}}
    <div class="promo-bar">
        <span>FLASH SALE - UP TO 40% OFF - ENDS IN</span>

        <span id="promo-countdown" data-duration="600"></span>

        <span>USE CODE: SHOCK40</span>
    </div>


    {{-- ================= MAIN NAVBAR ================= --}}
    <div class="header-main">

        {{-- LOGO --}}
        <a href="{{ url('/home') }}" class="header-logo">

            <img
                src="{{ asset('images/logo-mark.png') }}"
                alt="I-Commerce Logo"
                class="header-logo-image"
            >

            <span class="header-logo-text">I-Commerce</span>

        </a>

        {{-- NAVIGATION --}}
        <nav class="header-nav">

            <a href="{{ url('/home') }}"
            class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('shop.index') }}"
            class="nav-link {{ request()->routeIs('shop.index') ? 'active' : '' }}">
                Shop
            </a>

            <a href="#" class="nav-link">
                About
            </a>

            <a href="#" class="nav-link">
                Contacts
            </a>

        </nav>


        {{-- ACTIONS --}}
        <div class="header-actions">

            {{-- CART --}}
            <a href="#" class="header-cart">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 4h2l2 12h10l3-9H6"></path>
                    <circle cx="9" cy="20" r="1.5"></circle>
                    <circle cx="17" cy="20" r="1.5"></circle>
                </svg>



            </a>

        </div>

    </div>

</header>