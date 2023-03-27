<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rasalina - Personal Portfolio HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('components.frontend_header')
</head>

<body>

    <!-- preloader-start -->
    @include('frontend.body.header_page')

    <!-- main-area -->
    <main>
        @yield('page-content')
    </main>
    <!-- main-area-end -->

    <!-- Footer-area -->
    @include('frontend.body.footer')
    <!-- Footer-area-end -->
    <!-- JS here -->
    @include('components.frontend_script')
</body>

</html>
