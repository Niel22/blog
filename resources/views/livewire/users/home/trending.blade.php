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
            
            @include('includes.users.sticky-sidebar')
        </div>

    </div>
</div>