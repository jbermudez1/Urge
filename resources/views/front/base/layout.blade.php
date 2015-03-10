<!doctype html>
<html lang="es">
<head>
    @include('front.base.head')
</head>
<body>
    @include('front.base.menu')

    @yield('content')

    @include('front.base.footer')
    @include('front.base.script')
</body>
</html>