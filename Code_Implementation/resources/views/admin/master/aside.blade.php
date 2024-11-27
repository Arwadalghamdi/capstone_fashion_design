
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('admin.home') }}" class="app-brand-link text-center">
              <span class="app-brand-logo demo">
                <img src="{{asset('logo.png')}}" style="height: 100px;width: 100%;" alt="">
              </span>
                <p class="welcomeAdmin">  <i class="menu-icon tf-icons bx bx-user"></i> Welcome : Admin</p>
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
            <li class="menu-item {{Route::is('admin.home') || Route::is('admin.main') ? 'active' : ''}}">
              <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Control Users</span>
            </li>

            <li class="menu-item {{request()->is('*admins*') ? 'active' : ''}}">
              <a href="{{ route('admin.admins.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Admins</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*designers*') ? 'active' : ''}}">
              <a href="{{ route('admin.designers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Designers</div>
              </a>
            </li>


            <li class="menu-item {{request()->is('*customers*') ? 'active' : ''}}">
              <a href="{{ route('admin.customers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Customers</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Control Content</span>
            </li>

            <li class="menu-item {{request()->is('*categories*') ? 'active' : ''}}">
              <a href="{{ route('admin.categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Analytics">Categories</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*fashions*') ? 'active' : ''}}">
              <a href="{{ route('admin.fashions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-closet"></i>
                <div data-i18n="Analytics">Fashion Designs</div>
              </a>
            </li>


{{--            <li class="menu-item {{request()->is('*reviews*') ? 'active' : ''}}">--}}
{{--              <a href="{{ route('admin.reviews.index') }}" class="menu-link">--}}
{{--                <i class="menu-icon tf-icons bx bx-star"></i>--}}
{{--                <div data-i18n="Analytics">Reviews</div>--}}
{{--              </a>--}}
{{--            </li>--}}

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>

            <li class="menu-item {{request()->is('*reports/fashion*') ? 'active' : ''}}">
              <a href="{{ route('admin.reports.fashion') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Top Selling Fashion Designs</div>
              </a>
            </li>

            <li class="menu-item {{request()->is('*reports/customer*') ? 'active' : ''}}">
              <a href="{{ route('admin.reports.customer') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Most Engaged Customers</div>
              </a>
            </li>

          </ul>
        </aside>
