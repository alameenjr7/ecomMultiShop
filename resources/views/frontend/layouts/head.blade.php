<meta charset="UTF-8">
    <meta name="description" content="{{get_setting('meta_description')}}">
    <meta name="keywords" content="{{get_setting('meta_keywords')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{get_setting('title')}}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset(get_setting('favicon'))}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/sweetalert/sweetalert.css')}}">

    {{--autocomplete--}}
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/autocomplete/jquery-ui.css')}}css">

    @yield('styles')
