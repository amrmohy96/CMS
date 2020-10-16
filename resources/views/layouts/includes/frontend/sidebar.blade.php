<div class="wn__sidebar">
    <!-- Start Single Widget -->
    <aside class="widget search_widget">
        <h3 class="widget-title">Search</h3>
        <form method="get" action="{{route('frontend.index')}}">
            <div class="form-input">
                <input type="text" value="{{request()->search}}" name="search" placeholder="Search...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget recent_widget">
        <h3 class="widget-title">Recent</h3>
        <div class="recent-posts">
            <ul>
                @foreach($recent_posts as $post)
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="{{route('posts.show',$post->slug)}}">
                                    @if($post->media->count() > 0)
                                        <img src="{{ asset('assets/posts/' . $post->media->first()->file_name) }}" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('assets/posts/sm.jpg') }}" alt="blog images">
                                    @endif
                                </a>
                            </div>
                            <div class="content">
                                <h4><a href="blog-details.html">{{\Illuminate\Support\Str::limit($post->title,15,'...')}}</a></h4>
                                <p>{{$post->created_at->format('M d,y')}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget comment_widget">
        <h3 class="widget-title">Comments</h3>
        <ul>
            @foreach($recent_comments as $comment)
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('frontend/images/blog/comment/1.jpeg')}}"
                             alt="Comment images">
                    </div>
                    <div class="content">
                        <p>{{$comment->name}}</p>
                        <a href="#">{{\Illuminate\Support\Str::limit($comment->comment,15,"...")}}</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget category_widget">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($global_categories as $category)
            <li><a href="{{route('frontend.category',$category->slug)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget archives_widget">
        <h3 class="widget-title">Archives</h3>
        <ul>
            @foreach($global_archives as $key => $val)
                <li><a href="{{route('frontend.archive',$key.'-'.$val)}}">{{ date("F", mktime(0, 0, 0, $key, 1)) . ' ' . $val }}</a></li>
{{--       f for full month         --}}
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
</div>
