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
                                        href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span>
                                <h1 class="single_post_title_main">
                                    {{ $post->title }} </h1>
                                <span class="single-post-meta-wrapper"><span class="post-author"><span><img
                                                src="{{ asset('storage/'.$post->user->userDetails->image) }}" width="50" height="50" alt="{{ $post->user->name }}"
                                                class="avatar avatar-50 wp-user-avatar wp-user-avatar-50 alignnone photo"><a
                                                href="#" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></span></span><span class="post-date updated"><i
                                            class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i A') }}</span><span class="meta-comment"><i
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
                                <div class="post_content" style="text-align: justify">
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
                                                    <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" class="link_image featured-thumbnail"
                                                        title="It really great holiday and enjoy with the sea">
                                                        <img width="780" height="450"
                                                            src="{{ asset('storage/' . $post->image) }}"
                                                            class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image"
                                                            alt="">
                                                        <div class="background_over_image"></div>
                                                    </a>
                                                </div>
                                                <span class="meta-category-small"><a class="post-category-color-text"
                                                        style="background: {{ $post->category->color }}" href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span>
                                                <div class="post-entry-content">
                                                    <h3 class="jl-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                            {{ $post->title }}</a></h3>
                                                    <span class="jl_post_meta"><span class="jl_author_img_w"><img
                                                                src="{{ asset('storage/' . $post->user->userDetails->image) }}" width="30" height="30"
                                                                alt="{{ $post->user->name }}"
                                                                class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo"><a
                                                                href="#" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></span><span class="post-date"><i
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

                @include('includes.users.sticky-sidebar')
            </div>
        </div>
    </section>
</div>