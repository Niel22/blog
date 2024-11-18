<footer id="footer-container" class=" enable_footer_columns_dark">
    <div class="footer-columns">
       <div class="container">
          <div class="row">
             <div class="col-md-4"> <span class="jl_none_space"></span>
                <div id="disto_about_us_widget-3" class="widget jellywp_about_us_widget">
                   <div class="widget_jl_wrapper about_widget_content"> <span class="jl_none_space"></span>
                      <div class="widget-title">
                         <h2>About us</h2>
                      </div>
                      <div class="jellywp_about_us_widget_wrapper">
                         <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu,
                            iaculis a sem imperdiet ut imperdiet.</p>
                         <div class="social_icons_widget">
                            <ul class="social-icons-list-widget icons_about_widget_display">
                               <li><a href="#" class="facebook" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                               </li>
                               <li><a href="#" class="google_plus" target="_blank"><i
                                        class="fa fa-google-plus"></i></a>
                               </li>
                               <li><a href="#" class="behance" target="_blank"><i class="fa fa-behance"></i></a>
                               </li>
                               <li><a href="#" class="vimeo" target="_blank"><i
                                        class="fa fa-vimeo-square"></i></a>
                               </li>
                               <li><a href="#" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                               </li>
                               <li><a href="#" class="tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>
                               </li>
                               <li><a href="#" class="instagram" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                               </li>
                               <li><a href="#" class="linkedin" target="_blank"><i
                                        class="fa fa-linkedin"></i></a>
                               </li>
                               <li><a href="#" class="pinterest" target="_blank"><i
                                        class="fa fa-pinterest"></i></a>
                               </li>
                               <li><a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                               </li>
                               <li><a href="#" class="deviantart" target="_blank"><i
                                        class="fa fa-deviantart"></i></a>
                               </li>
                               <li><a href="#" class="dribble" target="_blank"><i
                                        class="fa fa-dribbble"></i></a>
                               </li>
                               <li><a href="#" class="dropbox" target="_blank"><i class="fa fa-dropbox"></i></a>
                               </li>
                               <li><a href="#" class="rss" target="_blank"><i class="fa fa-rss"></i></a>
                               </li>
                               <li><a href="#" class="skype" target="_blank"><i class="fa fa-skype"></i></a>
                               </li>
                               <li><a href="#" class="stumbleupon" target="_blank"><i
                                        class="fa fa-stumbleupon"></i></a>
                               </li>
                               <li><a href="#" class="wordpress" target="_blank"><i
                                        class="fa fa-wordpress"></i></a>
                               </li>
                            </ul>
                         </div>
                      </div> <span class="jl_none_space"></span>
                   </div>
                </div>
             </div>
             <div class="col-md-4"> <span class="jl_none_space"></span>
                <div id="disto_recent_post_widget-3" class="widget post_list_widget">
                   <div class="widget_jl_wrapper"> <span class="jl_none_space"></span>
                      <div class="widget-title">
                         <h2>Recent Posts</h2>
                      </div>
                      <div>
                         <ul class="feature-post-list recent-post-widget">
                           @foreach($recent_posts as $post)
                            <li>
                               <a href="#"
                                  class="jl_small_format feature-image-link image_post featured-thumbnail"
                                  title="{{ $post->title }}">
                                  <img width="120" height="120"
                                     src="{{ asset('storage/' . $post->image) }}"
                                     class="attachment-disto_small_feature size-disto_small_feature wp-post-image"
                                     alt="" />
                                  <div class="background_over_image"></div>
                               </a>
                               <div class="item-details"> <span class="meta-category-small"><a
                                        class="post-category-color-text" style="background: {{ $post->category->color }}"
                                        href="#">{{ $post->category->name }}</a></span>
                                  <h3 class="feature-post-title"><a href="#">
                                        {{ $post->title }}</a>
                                  </h3>
                                  <span class="post-meta meta-main-img auto_image_with_date"> <span
                                        class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span></span>
                               </div>
                            </li>
                            @endforeach
                         </ul>
                      </div> <span class="jl_none_space"></span>
                   </div>
                </div>
             </div>
             <div class="col-md-4">
                <div id="categories-4" class="widget widget_categories">
                   <div class="widget-title">
                      <h2>Categories</h2>
                   </div>
                   <ul>
                     @foreach($categories as $category)
                      <li class="cat-item"><a href="#"
                            title="Sample category description goes here">{{ $category->name }}</a> <span style="background: {{ $category->color }};">{{ $category->posts->count() }}</span>
                      </li>
                      @endforeach
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="footer-bottom enable_footer_copyright_dark">
       <div class="container">
          <div class="row bottom_footer_menu_text">
             <div class="col-md-6 footer-left-copyright">© Copyright {{ \Carbon\Carbon::now()->format('Y') }} NIEL. All Rights Reserved Powered
                by NIEL</div>
             <div class="col-md-6 footer-menu-bottom">
                <ul id="menu-footer-menu" class="menu-footer">
                   <li class="menu-item menu-item-10"><a href="#">About Us</a>
                   </li>
                   <li class="menu-item menu-item-11"><a href="#">Private policy</a>
                   </li>
                   <li class="menu-item menu-item-12"><a href="#">Forums</a>
                   </li>
                   <li class="menu-item menu-item-13"><a href="#">Community</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </footer>