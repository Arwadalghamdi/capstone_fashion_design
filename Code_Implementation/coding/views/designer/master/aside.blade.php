
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
              <a href="{{ route('designer.home') }}" class="app-brand-link text-center">
              <span class="app-brand-logo demo">
                <img src="{{asset('logo.png')}}" style="    height: 113px;
    width: 100%;" alt="">
              </span>
              </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
              <li class="menu-header small text-uppercase">
                  <span class="menu-header-text">Home Page</span>
              </li>
            <li class="menu-item {{Route::is('designer.home') || Route::is('designer.main') ? 'active' : ''}}">
              <a href="{{ route('designer.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Control Content</span>
            </li>

            <li class="menu-item {{request()->is('*fashions*') ? 'active' : ''}}">
              <a href="{{ route('designer.fashions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-closet"></i>
                <div data-i18n="Analytics">Fashion Designs</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*discounts*') ? 'active' : ''}}">
              <a href="{{ route('designer.discounts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-coupon"></i>
                <div data-i18n="Analytics">Discount Coupons</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*orders*') ? 'active' : ''}}">
              <a href="{{ route('designer.orders.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                <div data-i18n="Analytics">Orders</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*reviews*') ? 'active' : ''}}">
              <a href="{{ route('designer.reviews.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div data-i18n="Analytics">Reviews</div>
              </a>
            </li>


            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>

            <li class="menu-item {{request()->is('*reports/fashion*') ? 'active' : ''}}">
              <a href="{{ route('designer.reports.fashion') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Top Fashion</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*reports/customer*') ? 'active' : ''}}">
              <a href="{{ route('designer.reports.customer') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Top Customer</div>
              </a>
            </li>


          </ul>
        </aside>
