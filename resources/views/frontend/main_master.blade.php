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
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('frontend.body.header')
    <!-- header-area-end -->

    <!-- main-area -->
    <main>
        @yield('content')
    </main>
    <!-- main-area-end -->



    <!-- Footer-area -->
    @include('frontend.body.footer')
    <!-- Footer-area-end -->




    <!-- JS here -->
    @include('components.frontend_script')
</body>

</html>
