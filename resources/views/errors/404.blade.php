<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie ie9" lang="en-US">
   <![endif]-->
<html lang="en-US">


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <!-- Title-->
   <title>Page Not Found</title>
   <!-- Favicon-->
   <link rel="icon" href="{{ asset('assets_front/img/favicon.png')}}" type="image/x-icon">
   <!-- Stylesheets-->
   <link rel="stylesheet" href="{{ asset('assets_front/css/bootstrap.css')}}" type="text/css" media="all" />
   <link rel="stylesheet" href="{{ asset('assets_front/css/style.css')}}" type="text/css" media="all" />
   <link rel="stylesheet" href="{{ asset('assets_front/css/responsive.css')}}" type="text/css" media="all" />
   <link rel="stylesheet" href="{{ asset('assets_front/css/main.css')}}" type="text/css" media="all" />
   <!-- end head -->
</head>

<body class="mobile_nav_class jl-has-sidebar">
   <div class="options_layout_wrapper jl_radius jl_none_box_styles jl_border_radiuss">
      <div class="options_layout_container full_layout_enable_front">
         <!-- Start header -->
         @include('includes.users.header')
         <!-- end header -->
         @include('includes.users.sidebar')
         <div class="search_form_menu_personal">
            <div class="menu_mobile_large_close"><span class="jl_close_wapper search_form_menu_personal_click"><span
                     class="jl_close_1"></span><span class="jl_close_2"></span></span>
            </div>
            <livewire:users.search.widget />
         </div>
         <div class="mobile_menu_overlay"></div>
         <!-- content section -->
         <div class="d-flex text-center" style="padding: 100px 0">
            <h1>404</h1>
            <p>The page your are looking for doesnt exist</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
         </div>
         <!-- end content -->
         <!-- Start footer -->
         @include('includes.users.footer')
         <!-- End footer -->
      </div>
   </div>
   <div id="go-top"><a href="#go-top"><i class="fa fa-angle-up"></i></a>
   </div>
   <script src="{{ asset('assets_front/js/jquery.js') }}"></script>
   <script src="{{ asset('assets_front/js/fluidvids.js') }}"></script>
   <script src="{{ asset('assets_front/js/infinitescroll.js') }}"></script>
   <script src="{{ asset('assets_front/js/justified.js') }}"></script>
   <script src="{{ asset('assets_front/js/slick.js') }}"></script>
   <script src="{{ asset('assets_front/js/theia-sticky-sidebar.js') }}"></script>
   <script src="{{ asset('assets_front/js/aos.js') }}"></script>
   <script src="{{ asset('assets_front/js/custom.js') }}"></script>
</body>


</html>