<div class="jl_home_section jl_home_slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jl_mid_main_3col">
                <div class="page_builder_slider jelly_homepage_builder">
                    <div class="jl_slider_nav_tab large_center_slider_container">
                        <div class="row header-main-slider-large">
                            <div class="col-md-12">
                                <div class="large_center_slider_wrapper">
                                    <div class="home_slider_header_tab jelly_loading_pro">
                                        @foreach($hero_posts as $post)
                                        <div class="item">
                                            <div class="banner-carousel-item"> <span
                                                    class="image_grid_header_absolute"
                                                    style="background-image: url('{{ asset('storage/'. $post->image) }}')"></span>
                                                <a href="#" class="link_grid_header_absolute"></a>
                                                <div class="banner-container">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="banner-inside-wrapper"> <span
                                                                        class="meta-category-small"><a
                                                                            class="post-category-color-text"
                                                                            style="background:{{ $post->category->color }}"
                                                                            href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span>
                                                                    <h5><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">{{ $post->title }}</a>
                                                                    </h5>
                                                                    <span class="jl_post_meta"><span
                                                                            class="jl_author_img_w">
                                                                            <img src="{{asset('storage/'. $post->user->userDetails->image)}}" width="30"
                                                                                height="30" alt="Anna Nikova"
                                                                                class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo" /><a
                                                                                href="#"
                                                                                title="Posts by {{ $post->user->name }}"
                                                                                rel="author">{{ $post->user->name }}</a></span><span
                                                                            class="post-date"><i
                                                                                class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="jlslide_tab_nav_container">
                                        <div class="jlslide_tab_nav_row">
                                            <div class="home_slider_header_tab_nav news_tiker_loading_pro">
                                                @foreach($hero_posts as $post)
                                                <div class="item">
                                                    <div class="banner-carousel-item"> <span class="image_small_nav"
                                                            style="background-image: url('{{ asset('storage/'. $post->image) }}')"></span>
                                                        <h5>
                                                            {{ $post->title }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                @endforeach
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