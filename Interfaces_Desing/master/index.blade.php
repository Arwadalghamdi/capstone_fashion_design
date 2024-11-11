<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Fashion')</title>
    @include('customer.master.styles')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    @include('customer.master.top')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('customer.master.nav')
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('customer.master.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="{{route('customer.fashions')}}">
                <input type="text" id="search-input" name="w" value="{{request()->w}}" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('customer.master.scripts')
</body>

</html>