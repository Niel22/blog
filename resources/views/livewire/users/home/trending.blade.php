<div class="jl_home_section">
    <div class="container">
        <div class="homepage_builder_title">
            <h2 class="builder_title_home_page">
                Top Trending Posts
            </h2>
        </div>
        <div class="row">
            <div class="col-md-8" id="content">
                <div
                    class="post_list_medium_widget jl_nonav_margin page_builder_listpost jelly_homepage_builder jl-post-block-725291">
                    @foreach($trending as $post)
                    <div class="blog_list_post_style">
                        <div class="image-post-thumb featured-thumbnail home_page_builder_thumbnial">
                            <div class="jl_img_container"> <span class="image_grid_header_absolute"
                                    style="background-image: url('{{ asset('storage/' . $post->image) }}')"></span>
                                <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" class="link_grid_header_absolute"></a>
                            </div>
                        </div>
                        <div class="post-entry-content"> <span class="meta-category-small"><a
                                    class="post-category-color-text" style="background: {{ $post->category->color }}"
                                    href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span> <span
                                class="post-meta meta-main-img auto_image_with_date"><span class="post-date"><i
                                        class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</span><span class="meta-comment"><a
                                        href="#"><i class="fa fa-comment"></i>0</a></span></span>
                            <h3 class="image-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                    {{ $post->title }}</a>
                            </h3>
                            <div class="large_post_content">
                                <p>{{ substr($post->content, 0, 150) }}....
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4" id="sidebar">
                <div id="panel-4212-2-1-0" class="so-panel widget widget_socialcountplus panel-first-child"
                    data-index="5">
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
                                <a class="icon" href="http://www.twitch.tv//profile"
                                    rel="nofollow noopener noreferrer" target="_blank"></a><span class="items"><span
                                        class="count">20.5k</span><span class="label">followers</span></span>
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
                                <a class="icon" href="#" rel="nofollow noopener noreferrer"
                                    target="_blank"></a><span class="items"><span class="count">20.5k</span><span
                                        class="label">subscribers</span></span>
                            </li>
                            <li class="count-linkedin">
                                <a class="icon" href="https://www.linkedin.com/company/"
                                    rel="nofollow noopener noreferrer" target="_blank"></a><span class="items"><span
                                        class="count">20.5k</span><span class="label">followers</span></span>
                            </li>
                        </ul>
                    </div>
                </div> <span class="jl_none_space"></span>
                <div id="panel-4212-2-1-1"
                    class="so-panel widget widget_disto_category_image_widget_register jellywp_cat_image"
                    data-index="6">
                    <div class="wrapper_category_image">
                        <div class="category_image_wrapper_main">
                            @foreach($categories as $category)
                            <div class="category_image_bg_image"
                                style="background-image: url('{{ asset('storage/' . $category->image) }}');">
                                <a class="category_image_link" id="category_color_2" href="#"><span
                                        class="jl_cm_overlay"><span class="jl_cm_name">{{ $category->name }}</span><span
                                            class="jl_cm_count">{{$category->posts->count() }}</span></span></a>
                                <div class="category_image_bg_overlay" style="background: {{ $category->color }};"></div>
                            </div>
                            @endforeach
                        </div> <span class="jl_none_space"></span>
                    </div>
                </div> 
                <span class="jl_none_space"></span>
            </div>
        </div>

    </div>
</div>