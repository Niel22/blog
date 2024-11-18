<div class="col-md-4" id="sidebar"
    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">




    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
        <div id="socialcountplus-2" class="widget widget_socialcountplus">
            <div class="social-count-plus">
                <ul class="default">
                    <li class="count-facebook">
                        <a class="icon" href="https://www.facebook.com/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">likes</span></span>
                    </li>
                    <li class="count-instagram">
                        <a class="icon" href="https://instagram.com/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">followers</span></span>
                    </li>
                    <li class="count-pinterest">
                        <a class="icon" href="https://www.pinterest.com/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">followers</span></span>
                    </li>
                    <li class="count-twitch">
                        <a class="icon" href="http://www.twitch.tv//profile" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">followers</span></span>
                    </li>
                    <li class="count-twitter">
                        <a class="icon" href="https://twitter.com/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">followers</span></span>
                    </li>
                    <li class="count-vimeo">
                        <a class="icon" href="https://vimeo.com/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                class="label">followers</span></span>
                    </li>
                    <li class="count-youtube">
                        <a class="icon" href="#" rel="nofollow noopener noreferrer" target="_blank"></a><span
                            class="items"><span class="count">20.5k</span><span class="label">subscribers</span></span>
                    </li>
                    <li class="count-linkedin">
                        <a class="icon" href="https://www.linkedin.com/company/" rel="nofollow noopener noreferrer"
                            target="_blank"></a><span class="items"><span class="count">20.5k</span><span
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
                        <a class="category_image_link" id="category_color_2"
                            href="{{ route('category', ['category_slug' => $category->slug]) }}"><span
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
                                <img width="120" height="120" src="{{ asset('storage/' . $post->image) }}"
                                    class="attachment-disto_small_feature size-disto_small_feature wp-post-image"
                                    alt="">
                                <div class="background_over_image"></div>
                            </a>
                            <div class="item-details">
                                <span class="meta-category-small"><a class="post-category-color-text"
                                        style="background: {{ $post->category->color }}"
                                        href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{
                                        $post->category->name }}</a></span>
                                <h3 class="feature-post-title"><a
                                        href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                        {{ $post->title }}</a></h3>
                                <span class="post-meta meta-main-img auto_image_with_date"> <span class="post-date"><i
                                            class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans()
                                        }}</span></span>
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