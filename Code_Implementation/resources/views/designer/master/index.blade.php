<!DOCTYPE html>
<html
   lang="en"
   class="light-style"
   dir="ltr"
   data-theme="theme-default"
   data-assets-path="{{ url('admin/assets/') }}"
   data-template="vertical-menu-template-free"
   >
   <head>
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
         />
      <title>@yield('title', 'Fashion Design')</title>
      @include('designer.master.styles')
   </head>
   <body>
     @if(!isset($isAuth))
      <div class="layout-wrapper layout-content-navbar">
         <div class="layout-container">
            @include('designer.master.aside')
            <!-- Layout container -->
            <div class="layout-page">
               @include('designer.master.nav')
               <!-- Content wrapper -->
               <div class="content-wrapper">

                    @if(Session::has('success'))
                     <div class="container-xxl flex-grow-1 container-p-y">
                     <div class="alert alert-success alert-dismissible text-center" role="alert">
                           {{ Session::get('success') }}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>

                    @endif

                    @yield('content')
                    @include('designer.master.confirmation')
                  <div class="content-backdrop fade"></div>
               </div>
               <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
         </div>
         <!-- Overlay -->
         <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      @else
        @yield('content')
      @endif
      @include('designer.master.scripts')
   </body>
</html>