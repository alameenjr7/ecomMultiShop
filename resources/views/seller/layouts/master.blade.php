<!doctype html>
<html lang="en">

<head>
    @include('seller.layouts.head')
</head>
<body class="theme-cyan">

    <!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset(get_setting('logo'))}}" width="48" height="48" alt="Kaay-Deals"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

   @include('seller.layouts.nav')

    @include('seller.layouts.sidebar')

   @yield('content')

</div>
    @include('seller.layouts.footer')
</body>
</html>
