<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield ('title', ' E-BAG')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.partials.style')
</head>

<body class="animsition">
    <!-- Header -->
    @include('frontend.partials.header')


    @yield('content')

    <!-- Footer -->
    @include('frontend.partials.footer')


    @include('frontend.partials.script')

</body>

</html>