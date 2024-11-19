<header
            class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cusdate_head">
            <div class="header_top_bar_wrapper ">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="menu-primary-container navigation_wrapper">
                           <ul id="jl_top_menu" class="jl_main_menu">
                              <li
                                 class="menu-item menu-item-home current-menu-item page_item page-item-4212 current_page_item menu-item-4461">
                                 <a href="#" aria-current="page">Home<span class="border-menu"></span></a>
                              </li>
                              <li class="menu-item menu-item-3602"><a href="#">Member<span
                                       class="border-menu"></span></a>
                              </li>
                              <li class="menu-item menu-item-3606"><a href="#">special offer<span
                                       class="border-menu"></span></a>
                              </li>
                              <li class="menu-item menu-item-3598"><a href="#">Info!!<span
                                       class="border-menu"></span></a>
                              </li>
                           </ul>
                        </div>
                        <div class="jl_top_bar_right"> <span class="jl_current_title">Current Date:</span> {{ \Carbon\Carbon::now()->format('d M, Y') }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Start Main menu -->
            <div class="jl_blank_nav"></div>
            <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick ">
               <div class="container">
                  <div class="row">
                     <div class="main_menu col-md-12">
                        <div class="logo_small_wrapper_table">
                           <div class="logo_small_wrapper">
                              <!-- begin logo -->
                              <a class="logo_link" href="{{ route('home') }}">
                                 <img src="{{ asset('assets_front/img/logo.png')}}" alt="Just another WordPress site" />
                              </a>
                              <!-- end logo -->
                           </div>
                        </div>
                        <!-- main menu -->
                        <div class="menu-primary-container navigation_wrapper">
                           <ul id="mainmenu" class="jl_main_menu">
                              <li class="menu-item"> <a href="{{ route('home') }}">Home<span
                                       class="border-menu"></span></a>
                              </li>
                              @foreach($global_categories as $category)
                              <li class="menu-item"> <a href="{{ route('category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                              </li>
                              @endforeach
                              
                              
                           </ul>
                        </div>
                        <!-- end main menu -->
                        <div class="search_header_menu">
                           <div class="menu_mobile_icons"><i class="fa fa-bars"></i>
                           </div>
                           <div class="search_header_wrapper search_form_menu_personal_click"><i
                                 class="fa fa-search"></i>
                           </div>
                           <div class="menu_mobile_share_wrapper">
                              <ul class="social_icon_header_top">
                                 <li><a class="facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                 </li>
                                 <li><a class="google_plus" href="#" target="_blank"><i
                                          class="fa fa-google-plus"></i></a>
                                 </li>
                                 <li><a class="behance" href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>