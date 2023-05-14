<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite('resources/js/app.js')
</head>

<body class="bg-black text-white">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</body>

</html>
