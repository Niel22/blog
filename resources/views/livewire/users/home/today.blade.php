<div class="jl_home_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jl_mid_main_3col">
                <div class="jl_3col_wrapin">

                    <div
                        class="jelly_homepage_builder jl_nonav_margin homepage_builder_3grid_post jl_fontsize22 jl_cus_grid3 colstyle1">
                        <div class="homepage_builder_title">
                            <h2>
                                Trending Today
                            </h2>
                            <span class="jl_hsubt"></span>
                        </div>
                        <div class="jl_wrapper_row">
                            <div class="row">
                                @foreach($recent_posts as $post)
                                <div class="col-md-4 blog_grid_post_style  jl_row_1">
                                    <div class="jl_grid_box_wrapper">
                                        <div class="image-post-thumb">
                                            <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" class="link_image featured-thumbnail"
                                                title="This is a great photo and nice for shooting">
                                                <img width="780" height="450"
                                                    src="{{ asset('storage/' . $post->image) }}"
                                                    class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image"
                                                    alt="" />
                                                <div class="background_over_image"></div>
                                            </a> <span class="meta-category-small"><a
                                                    class="post-category-color-text" style="background: {{ $post->category->color}}"
                                                    href="#">{{ $post->category->name }}</a></span>
                                        </div>
                                        <div class="post-entry-content">
                                            <h3 class="image-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                    {{ $post->title }}</a>
                                            </h3>
                                            <span class="jl_post_meta"><span class="jl_author_img_w"> <img
                                                        src="{{asset('storage/' . $post->user->userDetails->image)}}" width="30" height="30"
                                                        alt="Anna Nikova"
                                                        class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" /><a
                                                        href="#" title="Posts by Anna Nikova" rel="author">{{ $post->user->name }}</a></span><span class="post-date"><i
                                                        class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span></span>
                                            <div class="content_post_grid">
                                                <p>
                                                    {{ substr($post->content, 0, 110) }}...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="clear_line_3col_home"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>