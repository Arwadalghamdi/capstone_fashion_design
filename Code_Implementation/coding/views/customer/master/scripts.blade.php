<script src="{{url('customer/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('customer/js/bootstrap.min.js')}}"></script>
@if(!isset($noNiceSelect))
<script src="{{url('customer/js/jquery.nice-select.min.js')}}"></script>
@endif
<script src="{{url('customer/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{url('customer/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('customer/js/jquery.countdown.min.js')}}"></script>
<script src="{{url('customer/js/jquery.slicknav.js')}}"></script>
<script src="{{url('customer/js/mixitup.min.js')}}"></script>
<script src="{{url('customer/js/owl.carousel.min.js')}}"></script>
<script src="{{url('customer/js/main.js')}}"></script>
@yield('js')