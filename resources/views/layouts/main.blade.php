<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <script defer src="{{ asset('js/cdn.min.js') }}"></script> --}}
    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column bg-main overflow-x-hidden h-100">
    @include('partials.header')

    <main class="flex-grow-1 flex-shrink-1">
        <div class="container">

            @yield('content')

        </div>
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
