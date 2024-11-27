
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('customer/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/magnific-popup.css')}}" type="text/css">
@if(!isset($noNiceSelect))

    <link rel="stylesheet" href="{{url('customer/css/nice-select.css')}}" type="text/css">
    @endif
    <link rel="stylesheet" href="{{url('customer/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('customer/css/custom.css')}}" type="text/css">
    @yield('css')
    @stack('css')
