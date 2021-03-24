<!DOCTYPE html>
<html lang=”en”>
<head>
    <meta charset=”UTF-8″ />

    <title>@yield('title')</title>

    <style> .active a{
        color: red;
        text-decoration: none;
    } </style>
</head>

<body>
    @include('partials.nav')
    @yield('content')

</body>

</html>
