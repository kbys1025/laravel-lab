<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.parts.head')
<body>
    <div id="app">
        @include('layouts.parts.header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
