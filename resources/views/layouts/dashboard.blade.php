<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.dashboard.header')
<body>
<div id="app">
    <div class="flex flex-row flex-nowrap">
        <div class="w-48 p-4">
            @include('layouts.dashboard.navbar')
        </div>
        <div class="w-full">
            @yield('content')
        </div>
    </div>
    @include('layouts.dashboard.footer')
</div>
</body>
</html>
