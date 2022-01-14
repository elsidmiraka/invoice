<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice</title>

    @include('components.css-sources')
</head>

<body>

    @yield('content')

    @include('components.js-sources')

</body>

</html>
