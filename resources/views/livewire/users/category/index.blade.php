<div>
    <div class="main_title_wrapper category_title_section jl_cat_img_bg">
        <div class="category_image_bg_image"
            style="background-image: url('{{ asset('storage/' . $category->image) }}');">
        </div>
        <div class="category_image_bg_ov"></div>
        <div class="jl_cat_title_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 main_title_col">
                        <div class="jl_cat_mid_title">
                            <h3 class="categories-title title">{{ $category->name }}</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jl_post_loop_wrapper" style="transform: none;">
        <div class="container" id="wrapper_masonry" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-8 grid-sidebar" id="content">
                    <div class="jl_wrapper_cat">
                        <div id="content_masonry" class="pagination_infinite_style_cat ">
                            @foreach($posts as $post)
                            <div class="box jl_grid_layout1 blog_grid_post_style post-2970 post type-post status-publish format-gallery has-post-thumbnail hentry category-business tag-inspiration tag-morning tag-racing post_format-post-format-gallery aos-init aos-animate"
                                data-aos="fade-up">
                                <div class="post_grid_content_wrapper">
                                    <div class="image-post-thumb">
                                        <a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}" class="link_image featured-thumbnail"
                                            title="{{ $post->title }}">
                                            <img width="780" height="450"
                                                src="{{ asset('storage/' .$post->image) }}"
                                                class="attachment-disto_large_feature_image size-disto_large_feature_image wp-post-image"
                                                alt="">
                                            <div class="background_over_image"></div>
                                        </a> <span class="meta-category-small"><a class="post-category-color-text"
                                                style="background: {{ $post->category->color }}" href="{{ route('category', ['category_slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span>
                                    </div>
                                    <div class="post-entry-content">
                                        <div class="post-entry-content-wrapper">
                                            <div class="large_post_content">
                                                <h3 class="image-post-title"><a href="{{ route('post.details', ['category_slug' => $post->category->slug, 'post_slug' => $post->slug]) }}">
                                                        {{ $post->title }}</a></h3>
                                                <span class="jl_post_meta"><span class="jl_author_img_w"><img
                                                            src="{{ asset('storage/' .$post->user->userDetails->image) }}" width="30" height="30"
                                                            alt="{{ $post->user->name }}"
                                                            class="avatar avatar-30 wp-user-avatar wp-user-avatar-30 alignnone photo"><a
                                                            href="#" title="Posts by {{ $post->user->name }}" rel="author">{{ $post->user->name }}</a></span><span class="post-date"><i
                                                            class="fa fa-clock-o"></i>{{ $post->created_at->format('M d, Y') }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($category->posts->count() > $perPage)
                        <div class="jl-loadmore-btn-w">
                            <button wire:click="loadMore()" class="jl_btn_load">
                                <span wire:loading.remove wire:target="loadMore">Load more</span>
                                <x-spinner wire:loading wire:target="loadMore" />
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                
                @include('includes.users.sticky-sidebar')
            </div>
        </div>
    </div>
</div>