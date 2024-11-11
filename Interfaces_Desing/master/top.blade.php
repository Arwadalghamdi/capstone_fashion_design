<div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
            @if(auth('customers')->check())      
                            <a href="{{route('customer.profile.index')}}">Profile</a>
                            @else
                            <a href="{{route('customer.login')}}">Sign in</a>
                            <a href="{{route('customer.register')}}">Sign Up</a>
                            @endif
            </div>
            @if(auth('customers')->check())
            <div class="offcanvas__top__hover">
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
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{url('customer/img/icon/search.png')}}" alt=""></a>
            <a href="#"><img src="{{url('customer/img/icon/cart.png')}}" alt=""> <span>{{ Cart::count() }}</span></a>
            <div class="price">{{ Cart::subtotal() }} SAR</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>You can get your best option from designer & fashion design here.</p>
        </div>
    </div>