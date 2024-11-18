<div>
    <div class="jl_single_style8">
        <div class="single_captions_aboves_image_full_width_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jl_single_full_box">

                            <span class="image_grid_header_absolute"
                                style="background-image: url('{{ asset('storage/' . $post->image) }}')"></span>
                            <span class="link_grid_header_absolute"></span>

                            <div class="single_post_entry_content single_post_caption_full_width_format">
                                <span class="meta-category-small single_meta_category"><a
                                        class="post-category-color-text" style="background: {{ $post->category->color }}"
                                        href="#">{{ $post->category->name }}</a></span>
                                <h1 class="single_post_title_main">
                                    {{ $post->title }} </h1>
                                <span class="single-post-meta-wrapper"><span class="post-author"><span><img
                                                src="{{ asset('storage/'.$post->user->userDetails->image) }}" width="50" height="50" alt="{{ $post->user->name }}"
                                                class="avatar avatar-50 wp-user-avatar wp-user-avatar-50 alignnone photo"><a
                                                href="#" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></span></span><span class="post-date updated"><i
                                            class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span><span class="meta-comment"><i
                                            class="fa fa-comment"></i><a href="#">0 Comment</a></span><a href="#"
                                        class="jm-post-like liked" data-post_id="2963" title="Unlike"><i
                                            class="fa fa-heart"></i>0</a><span class="view_options"><i
                                            class="fa fa-eye"></i>{{ formatNumber($post->views) }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="content_main" class="clearfix jl_spost" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row main_content" style="transform: none;">
                <div class="col-md-8  loop-large-post" id="content">
                    <div class="widget_container content_page">
                        <!-- start post -->
                        <div class="post-2963 post type-post status-publish format-standard has-post-thumbnail hentry category-science tag-gaming tag-inspiration"
                            id="post-2963">
                            <div class="single_section_content box blog_large_post_style">
                                <div class="post_content">
                                    <p>{!! nl2br(e($post->content)) !!}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="single_tag_share">
                                    <div class="tag-cat">
                                        <ul class="single_post_tag_layout">
                                            @foreach(json_decode($post->tags) as $tag)
                                                <li><a href="#" rel="tag">{{ $tag }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="single_post_share_icons">
                                        Share<i class="fa fa-share-alt"></i></div>
                                </div>
                                <div class="single_post_share_wrapper">
                                    <div class="single_post_share_icons social_popup_close"><i class="fa fa-close"></i>
                                    </div>
                                    <ul class="single_post_share_icon_post">
                                        <li class="single_post_share_facebook"><a href="#" target="_blank"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li class="single_post_share_twitter"><a href="#" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li class="single_post_share_pinterest"><a href="#" target="_blank"><i
                                                    class="fa fa-pinterest"></i></a></li>
                                        <li class="single_post_share_linkedin"><a href="#" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></li>
                                        <li class="single_post_share_ftumblr"><a href="#" target="_blank"><i
                                                    class="fa fa-tumblr"></i></a></li>
                                    </ul>
                                </div>

                                @if($previous != null)
                                <div class="postnav_left">
                                    <div class="single_post_arrow_content">
                                        <a href="{{ route('post.details', ['category_slug' => $previous->category->slug, 'post_slug' => $previous->slug]) }}" id="prepost">
                                            {{ $previous->title }} <span
                                                class="jl_post_nav_left">
                                                Previous post</span></a>
                                    </div>
                                </div>
                                @endif


                                @if($next != null)
                                <div class="postnav_right">
                                    <div class="single_post_arrow_content">
                                        <a href="{{ route('post.details', ['category_slug' => $next->category->slug, 'post_slug' => $next->slug]) }}" id="nextpost">
                                            {{ $next->title }} <span class="jl_post_nav_left">
                                                Next post</span></a>
                                    </div>
                                </div>
                                @endif


                                <div class="auth">
                                    <div class="author-info">
                                        <div class="author-avatar">
                                            <img src="{{ asset('storage/' . $post->user->userDetails->image) }}" width="165" height="165" alt="Anna Nikova"
                                                class="avatar avatar-165 wp-user-avatar wp-user-avatar-165 alignnone photo">
                                        </div>
                                        <div class="author-description">
                                            <h5><a href="#">
                                                    {{ $post->user->name }}</a></h5>
                                            <p style="text-align: justify">
                                                The author is a passionate writer with a strong interest in various topics, including technology, lifestyle, and
                                                personal development. With a keen eye for detail and a desire to share knowledge, the author has dedicated years to
                                                writing informative and engaging content. Whether it's exploring the latest trends in the tech world or offering tips on
                                                everyday life, the author strives to connect with readers and provide valuable insights. When not writing, the author
                                                enjoys exploring new ideas, staying updated with industry news, and engaging with the community. </p>

                                        </div>
                                    </div>
                                </div>



                                @if($posts->count() > 0)
                                <div class="related-posts">

                                    <h4>
                                        Related Articles </h4>

                                    <div class="single_related_post">

                                        @foreach($posts as $post)
                                        <div class="jl_related_feature_items">
                                            <div class="jl_related_feature_items_in">
                                                <div class="image-post-thumb">
                                                    <a href="#" class="link_image featured-thumbnail"
                                                        title="It really great holiday and enjoy with the sea">
                                                        <img width="780" height="450"
                                                            src="{{ asset('storage/' . $post->image) }}"
                                                            class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image"
                                                            alt="">
                                                        <div class="background_over_image"></div>
                                                    </a>
                                                </div>
                                                <span class="meta-category-small"><a class="post-category-color-text"
                                                        style="background: {{ $post->category->color }}" href="#">{{ $post->category->name }}</a></span>
                                                <div class="post-entry-content">
                                                    <h3 class="jl-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                            {{ $post->title }}</a></h3>
                                                    <span class="jl_post_meta"><span class="jl_author_img_w"><img
                                                                src="{{ asset('storage/' . $post->user->userDetails->image) }}" width="30" height="30"
                                                                alt="{{ $post->user->name }}"
                                                                class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo"><a
                                                                href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></span><span class="post-date"><i
                                                                class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span></span>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach


                                    </div>

                                </div>
                                @endif
                                <!-- comment -->

                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a
                                                rel="nofollow" id="cancel-comment-reply-link" href="#"
                                                style="display:none;">Cancel reply</a></small></h3>
                                    <form action="#" method="post" id="commentform" class="comment-form">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                published.</span> Required fields are marked <span
                                                class="required">*</span>
                                        </p>
                                        <p class="comment-form-comment">
                                            <textarea class="u-full-width" id="comment" name="comment" cols="45"
                                                rows="8" aria-required="true" placeholder="Comment"></textarea>
                                        </p>
                                        <div class="form-fields row"><span class="comment-form-author col-md-4"><input
                                                    id="author" name="author" type="text" value="" size="30"
                                                    placeholder="Fullname"></span>
                                            <span class="comment-form-email col-md-4"><input id="email" name="email"
                                                    type="text" value="" size="30" placeholder="Email Address"></span>
                                            <span class="comment-form-url col-md-4"><input id="url" name="url"
                                                    type="text" value="" size="30" placeholder="Web URL"></span>
                                        </div>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit"
                                                value="Post Comment">
                                        </p>
                                    </form>
                                </div><!-- #respond -->

                            </div>
                        </div>
                        <!-- end post -->
                        <div class="brack_space"></div>
                    </div>
                </div>

                <div class="col-md-4" id="sidebar"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">




                    <div class="theiaStickySidebar"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                        <div id="socialcountplus-2" class="widget widget_socialcountplus">
                            <div class="social-count-plus">
                                <ul class="default">
                                    <li class="count-facebook">
                                        <a class="icon" href="https://www.facebook.com/"
                                            rel="nofollow noopener noreferrer" target="_blank"></a><span
                                            class="items"><span class="count">20.5k</span><span
                                                class="label">likes</span></span>
                                    </li>
                                    <li class="count-instagram">
                                        <a class="icon" href="https://instagram.com/" rel="nofollow noopener noreferrer"
                                            target="_blank"></a><span class="items"><span
                                                class="count">20.5k</span><span class="label">followers</span></span>
                                    </li>
                                    <li class="count-pinterest">
                                        <a class="icon" href="https://www.pinterest.com/"
                                            rel="nofollow noopener noreferrer" target="_blank"></a><span
                                            class="items"><span class="count">20.5k</span><span
                                                class="label">followers</span></span>
                                    </li>
                                    <li class="count-twitch">
                                        <a class="icon" href="http://www.twitch.tv//profile"
                                            rel="nofollow noopener noreferrer" target="_blank"></a><span
                                            class="items"><span class="count">20.5k</span><span
                                                class="label">followers</span></span>
                                    </li>
                                    <li class="count-twitter">
                                        <a class="icon" href="https://twitter.com/" rel="nofollow noopener noreferrer"
                                            target="_blank"></a><span class="items"><span
                                                class="count">20.5k</span><span class="label">followers</span></span>
                                    </li>
                                    <li class="count-vimeo">
                                        <a class="icon" href="https://vimeo.com/" rel="nofollow noopener noreferrer"
                                            target="_blank"></a><span class="items"><span
                                                class="count">20.5k</span><span class="label">followers</span></span>
                                    </li>
                                    <li class="count-youtube">
                                        <a class="icon" href="#" rel="nofollow noopener noreferrer"
                                            target="_blank"></a><span class="items"><span
                                                class="count">20.5k</span><span class="label">subscribers</span></span>
                                    </li>
                                    <li class="count-linkedin">
                                        <a class="icon" href="https://www.linkedin.com/company/"
                                            rel="nofollow noopener noreferrer" target="_blank"></a><span
                                            class="items"><span class="count">20.5k</span><span
                                                class="label">followers</span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <span class="jl_none_space"></span>

                        <div id="disto_category_image_widget_register-5" class="widget jellywp_cat_image">
                            <div class="wrapper_category_image">
                                <div class="category_image_wrapper_main">
                                    @foreach($global_categories as $category)
                                    <div class="category_image_bg_image"
                                        style="background-image: url('{{ asset('storage/' . $category->image) }}');">
                                        <a class="category_image_link" id="category_color_2" href="#"><span
                                                class="jl_cm_overlay"><span class="jl_cm_name">{{ $category->name }}</span><span
                                                    class="jl_cm_count">{{ $category->posts->count() }}</span></span></a>
                                        <div class="category_image_bg_overlay" style="background: {{ $category->color }};"></div>
                                    </div>
                                    @endforeach
                                </div> <span class="jl_none_space"></span>
                            </div>
                        </div><span class="jl_none_space"></span>
                        <div id="disto_recent_post_widget-7" class="widget post_list_widget">
                            <div class="widget_jl_wrapper"><span class="jl_none_space"></span>
                                <div class="widget-title">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div>
                                    <ul class="feature-post-list recent-post-widget">
                                        @foreach($global_recent_posts as $post)
                                        <li>
                                            <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}"
                                                class="jl_small_format feature-image-link image_post featured-thumbnail"
                                                title="{{ $post->title }}">
                                                <img width="120" height="120"
                                                    src="{{ asset('storage/' . $post->image) }}"
                                                    class="attachment-disto_small_feature size-disto_small_feature wp-post-image"
                                                    alt="">
                                                <div class="background_over_image"></div>
                                            </a>
                                            <div class="item-details">
                                                <span class="meta-category-small"><a class="post-category-color-text"
                                                        style="background: {{ $post->category->color }}" href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">{{ $post->category->name }}</a></span>
                                                <h3 class="feature-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                        {{ $post->title }}</a></h3>
                                                <span class="post-meta meta-main-img auto_image_with_date"> <span
                                                        class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span></span>
                                            </div>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <span class="jl_none_space"></span>
                            </div>
                        </div><span class="jl_none_space"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>