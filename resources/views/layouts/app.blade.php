<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Підключення CSS Bootstrap з CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body id="app-layout">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       {{-- 
        <a class="navbar-brand" href="#">
            Laravel
        </a>
        --}}
        @include('components.modal')
    </nav>

    @yield('content')

</body>

</html>