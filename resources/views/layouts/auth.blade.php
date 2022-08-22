<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.auth.header')
<body>
<div id="app">
    @include('layouts.auth.navbar')
    @yield('content')
    @include('layouts.auth.footer')
</div>
</body>
</html>
