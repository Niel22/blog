<div class="jl_home_section jl_home_mbg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jl_mid_main_3col">
                <div class="jl_3col_wrapin">
                    <div class="jl_main_with_right_post jelly_homepage_builder">
                        <div class="homepage_builder_title">
                            <h2 class="builder_title_home_page">
                                Top Of the week
                            </h2>
                        </div>
                        <div class="row jl_front_b_cont">
                            <div class="col-md-12 jl_mid_main_3col">
                                <div class="jl_3col_wrapin">
                                    <div id="pl-3476" class="panel-layout">
                                        <div id="pg-3476-0" class="panel-grid panel-no-style">
                                            <div id="pgc-3476-0-0" class="panel-grid-cell"><span
                                                    class="jl_none_space"></span>
                                                <div id="panel-3476-0-0-0"
                                                    class="so-panel widget widget_disto_recent_grid5_widgets jl_widget_recent_grid5 panel-first-child panel-last-child"
                                                    data-index="0">
                                                    <div class="jl_grid5_builder jelly_homepage_builder">
                                                        <div class="jl_grid5_wrapper">
                                                            <div class="jl_grid5_container">
                                                                <div class="jl_grid5_item jl_grid5main jl_grid1">
                                                                    <div class="jl_grid5_itemin">
                                                                        <span class="image_grid_header_absolute"
                                                                            style="background-image: url('{{ asset('storage/' . $top_of_week->image) }}')"></span>
                                                                        <a href="{{ route('post.details', ['category_slug' => $top_of_week->category->slug, 'post_slug' => $top_of_week->slug]) }}" class="link_grid_header_absolute"
                                                                            title="{{ $top_of_week->title }}"></a>
                                                                        <span class="meta-category-small"><a
                                                                                class="post-category-color-text"
                                                                                style="background: {{ $top_of_week->category->color }}"
                                                                                href="{{ route('category', ['category_slug' => $top_of_week->category->slug]) }}">{{ $top_of_week->category->name }}</a></span>
                                                                        <div
                                                                            class="wrap_box_style_main image-post-title">
                                                                            <h3 class="image-post-title"><a href="{{ route('post.details', ['category_slug' => $top_of_week->category->slug, 'post_slug' => $top_of_week->slug]) }}">
                                                                                    {{ $top_of_week->title }}</a></h3>
                                                                            <span class="jl_post_meta"><span
                                                                                    class="jl_author_img_w"><img
                                                                                        src="{{ asset('storage/' . $top_of_week->user->userDetails->image) }}" width="30"
                                                                                        height="30" alt="{{ $top_of_week->user->name }}"
                                                                                        class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo"><a
                                                                                        href="{{ route('author', ['author' => encrypt($top_of_week->user->id)]) }}"
                                                                                        title="Posts by {{ $top_of_week->user->name }}"
                                                                                        rel="author"> {{ $top_of_week->user->name }} </a></span><span
                                                                                    class="post-date"><i
                                                                                        class="fa fa-clock-o"></i>{{ $top_of_week->created_at->diffForHumans() }}</span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @foreach($tops_of_week as $post)
                                                                <div class="jl_grid5_item jl_grid5small jl_grid2">
                                                                    <div class="jl_grid5_itemin">
                                                                        <span class="image_grid_header_absolute"
                                                                            style="background-image: url('{{ asset('storage/'. $post->image) }}')"></span>
                                                                        <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" class="link_grid_header_absolute"
                                                                            title="{{ $post->title }}"></a>
                                                                        <span class="meta-category-small"><a
                                                                                class="post-category-color-text"
                                                                                style="background: {{ $post->category->color }}"
                                                                                href="#">{{ $post->category->name }}</a></span>
                                                                        <div
                                                                            class="wrap_box_style_main image-post-title">
                                                                            <h3 class="image-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                                                    {{ $post->title }}</a></h3>
                                                                            <span class="jl_post_meta"><span
                                                                                    class="jl_author_img_w"><img
                                                                                        src="{{ asset('storage/' . $post->user->userDetails->image) }}" width="30"
                                                                                        height="30" alt="{{ $post->user->name }}"
                                                                                        class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo"><a
                                                                                        href="{{ route('author', ['author' => encrypt($post->user->id)]) }}"
                                                                                        title="Posts by {{ $post->user->name }}"
                                                                                        rel="author">{{ $post->user->name }}</a></span><span
                                                                                    class="post-date"><i
                                                                                        class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="jl_none_space"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>