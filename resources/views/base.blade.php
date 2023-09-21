<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Menu Demo</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background text-text-main font-custom">
@include('menu')
<!-- Your main content goes here -->
@yield('content')
@include('footer')
@include('scripts')
</body>
</html>
