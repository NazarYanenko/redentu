<!doctype html>
<html lang="en">
@include('partials.head')
@include('partials.header')
<body>
    <div class="wrapper">
        @yield('content')
    </div>
@include('partials.scripts')
</body>
</html>