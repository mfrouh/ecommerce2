<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
 @include('layouts.head')
<body>
    <div id="app">
        <x-navbar></x-navbar>
        <main  class="py-8" style=" padding-top:1rem!important;"  class="animate-bottom">
            @yield('content')
        </main>
    </div>
</body>
@include('layouts.foot')
</html>
