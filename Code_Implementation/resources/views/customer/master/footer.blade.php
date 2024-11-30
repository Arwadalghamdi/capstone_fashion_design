<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a  href="{{route('customer.home')}}"><img style="
    height: 100px;

}" src="{{url('logo.png')}}" alt=""></a>
                        </div>
                        <p>You can customize your fashion design with the best designers.</p>
                        <a href="{{route('customer.home')}}"><img src="{{url('customer/img/payment.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            @if(auth('customers')->check())
                            <li>
                                <a href="{{route('customer.profile.index')}}">Profile</a>
                            </li>
                            <li>
                                <a href="{{route('customer.profile.orders')}}">My Orders</a>
                            </li>
                            @else
                            <li>
                                <a href="{{route('customer.login')}}">Sign In</a>
                            </li>
                            <li>
                                <a href="{{route('customer.register')}}">Sign Up</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Important Links</h6>
                        <ul>
                            <li><a href="{{route('customer.home')}}">Home</a></li>
                            <li><a href="{{route('customer.contact')}}">Contact Us</a></li>
                            <li><a href="{{route('customer.contact')}}">Fashion Design</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Join With Us</h6>
                        <div class="footer__newslatter">
                            <p>Be a part of Nakhla Fashion, where creativity meets opportunity. Showcase your unique designs and collaborate with leading designers to bring your vision to life.</p>
                            <a href="{{route('designer.register')}}" class="site-btn text-white">Join Now</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright © {{Date('Y')}} | Nakhla Fashion Design team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
