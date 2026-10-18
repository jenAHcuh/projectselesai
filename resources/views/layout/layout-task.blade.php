<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Experiment' }}</title>

    {{-- Global font --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    {{-- CSS khusus halaman experiment --}}
    @yield('page-css')

</head>

<body>

    <main>
        @yield('content')
    </main>

    @yield('page-js')

</body>

</html>