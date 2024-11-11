<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>You can get your best option from designer & fashion design here.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                            @if(auth('customers')->check())
                            <a href="{{route('customer.profile.index')}}">Profile</a>
                            @else
                            <a href="{{route('customer.login')}}">Sign in</a>
                            <a href="{{route('customer.register')}}">Sign Up</a>
                            @endif
                            </div>
                            @if(auth('customers')->check())
                            <div class="header__top__hover">
                                <span>{{ auth('customers')->user()->name }} <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>
                                        <a href="{{ route('customer.profile.orders') }}" class="n-link">My Orders</a>
                                    </li>
                                    <li>
                                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="n-link" href="#">Logout</a>

                                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{route('customer.home')}}"><img src="{{url('logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{route('customer.home')}}">Home</a></li>
                            <li><a class="{{request()->is('fashions') ? 'active' : ''}}" href="{{route('customer.fashions')}}">Fashion Designs</a></li>
                            <li><a  class="{{request()->is('designers') ? 'active' : ''}}" href="{{route('customer.designers')}}">Designers</a></li>
                            <li><a class="{{request()->is('contact') ? 'active' : ''}}" href="{{route('customer.contact')}}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                       @if(request()->is('/'))
                            <a href="#" class="search-switch"><img src="{{url('customer/img/icon/search.png')}}" alt=""></a>
                       @endif
                        <a href="{{route('customer.cart.index')}}"><img src="{{url('customer/img/icon/cart.png')}}" alt=""> <span>{{ Cart::count() }}</span></a>
                        <div class="price"><span id="total-cart">{{Cart::subtotal()}}</span> SAR</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
