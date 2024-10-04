<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Include any CSS or JavaScript files -->
</head>
<body>
    <!-- CSRF Token Field (Example of hidden input) -->
    <form id="csrf-form" method="post">
        @csrf
        <!-- This form is just to include the CSRF token. It can be hidden if needed. -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <!-- Content Section -->
    @yield('content')

    <!-- Include any JavaScript files -->
</body>
</html>