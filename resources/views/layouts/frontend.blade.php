<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.frontend.header')
<body>
<div id="app">
    @yield('content')
    @include('layouts.frontend.footer')
</div>
</body>
</html>
