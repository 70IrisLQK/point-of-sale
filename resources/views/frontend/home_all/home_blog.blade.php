<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('blog.show', [$blog->id]) }}"><img
                                    src="{{ asset('upload/admin_images/' . $blog->image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="{{ url('blog') }}">{{ $blog->blogCategory->name }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="blog-details.html">{{ $blog->title }}</a></h3>
                            <a href="{{ route('blog.show', [$blog->id]) }}" class="read__more">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>
