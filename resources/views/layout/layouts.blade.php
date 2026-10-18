<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta
        name="I-commerse"
        content="I-commerse: buy a nice clothes."
    />

    <link
        rel="preload"
        href="{{ asset('font/Geist/Geist-VariableFont_wght.ttf') }}"
        as="font"
        type="font/ttf"
        crossorigin
    >

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bread.css') }}">

    @yield('page-css')
</head>
<body>

    {{-- ================== HEADER ================== --}}
    @include('partials.header')


    {{-- ================== BREADCRUMB ================== --}}
    @hasSection('breadcrumb')

        <section class="breadcrumb-section">
            <div class="container">

                <div class="breadcrumb-title">
                    @yield('breadcrumb-title')
                </div>

                <div class="breadcrumb">
                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    @yield('breadcrumb')
                </div>

            </div>
        </section>

    @endif


    {{-- ================== CONTENT ================== --}}
    <main>
        @yield('content')
    </main>


    {{-- ================== FOOTER ================== --}}
    @include('partials.footer')


    <script src="{{ asset('js/promo.js') }}"></script>

    @yield('page-js')

</body>
</html>