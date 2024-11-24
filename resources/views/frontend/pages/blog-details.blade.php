@extends('frontend.layouts.master')
@section('content')
    <!-- START -->
    <section>
        <div class="inn-ban">
            <div class="container">
                <div class="row">
                    <h1>{{ $blog->title }}</h1>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="blog.html">All Posts</a></li>
                        <li class="breadcrumb-item"><a href="blog.html">Wedding</a></li>
                        <li class="breadcrumb-item active">{{ $blog->title }}</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="blog-main blog-detail">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <!--BIG POST START-->
                            <div class="blog-home-box">
                                <div class="im">
                                    <img src="{{ asset($blog->image) }}" alt="" loading="lazy">
                                    <span
                                        class="blog-date">{{ \Carbon\Carbon::parse($blog->date)->format('d, M Y') }}</span>
                                    <div class="shar-1">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <ul>
                                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                            <li><span><i class="fa fa-link" aria-hidden="true" data-toggle="modal"
                                                        data-target="#sharepop"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="txt">
                                    @foreach ($blog->tags as $tag)
                                        <span class="blog-cate">{{ $tag->name }}</span>
                                    @endforeach
                                    <div class="mt-3">
                                        {!! $blog->description !!}
                                    </div>
                                    @if ($blog->author_image && $blog->author_name)
                                        <div class="blog-info">
                                            <div class="blog-pro-info">
                                                <img src="{{ asset($blog->author_image) }}" alt="" loading="lazy">
                                                <h5>{{ $blog->author_name }} <span>Author</span></h5>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--END BIG POST START-->

                            <!--START-->
                            <div class="blog-nav">
                                @if ($prev_post)
                                    <div class="com lhs">
                                        <span><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous post</span>
                                        <h4>{{ $prev_post->title }}</h4>
                                        <a href="/blog-details/{{ $prev_post->id }}" class="fclick"></a>
                                    </div>
                                @endif
                                @if ($next_post)
                                    <div class="com rhs">
                                        <span>Next post <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                        <h4>{{ $next_post->title }}</h4>
                                        <a href="/blog-details/{{ $next_post->id }}" class="fclick"></a>
                                    </div>
                                @endif
                            </div>
                            <!--END-->

                        </div>
                        <div class="rhs">
                            <div class="blog-com-rhs">
                                <!-- SOCIAL MEDIA START-->
                                <div class="blog-soci">
                                    <h4>Social media</h4>
                                    <ul>
                                        <li><a target="_blank" href="#!" class="sm-fb-big"><b>3k</b> Facebook</a></li>
                                        <li><a target="_blank" href="#!" class="sm-tw-big"><b>10K</b> Twitter</a></li>
                                        <li><a target="_blank" href="#!" class="sm-li-big"><b>1k</b> Linkedin</a></li>
                                        <li><a target="_blank" href="#!" class="sm-yt-big"><b>100K</b> Youtube</a></li>
                                    </ul>
                                </div>
                                <!-- SOCIAL MEDIA END-->
                                <!-- ADS START-->
                                <div class="blog-rhs-cate">
                                    <h4>Category</h4>
                                    <ul>
                                        @foreach ($blog_categories as $category)
                                            <li><a
                                                    href="/blogs?category={{ $category->slug }}"><span>{{ $loop->iteration }}</span><b>{{ $category->name }}</b></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- ADS END-->
                                <!--TOP POSTS-->
                                <div class="hot-page2-hom-pre blog-rhs-trends">
                                    <h4>Trending Posts</h4>
                                    <ul>
                                        @foreach ($trending_blogs as $trending)
                                            <li>
                                                <div class="hot-page2-hom-pre-1">
                                                    <img src="{{ asset($trending->image) }}" alt="" loading="lazy">
                                                </div>
                                                <div class="hot-page2-hom-pre-2">
                                                    <h5>{{ $trending->title }}</h5>
                                                </div>
                                                <a href="/blog-details/{{ $trending->id }}" class="fclick"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--TOP POSTS-->
                                <!-- SUBSCRIBE START-->
                                <div class="blog-subsc">
                                    <div class="ud-rhs-poin1">
                                        <img src="../../../cdn-icons-png.flaticon.com/512/6349/6349282.png" alt=""
                                            loading="lazy">
                                        <h5>Subscribe <b>Newsletter</b></h5>
                                    </div>
                                    <form name="news_newsletter_subscribe_form" id="news_newsletter_subscribe_form">
                                        <ul>
                                            <li><input type="text" name="news_newsletter_subscribe_name"
                                                    placeholder="Enter Email Id*" class="form-control" required="">
                                            </li>
                                            <li><input type="submit" id="news_newsletter_subscribe_submit"
                                                    name="news_newsletter_subscribe_submit" class="form-control"></li>
                                        </ul>
                                    </form>
                                </div>
                                <!-- SUBSCRIBE END-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="blog-rel slid-inn">
            <div class="container">
                <div class="row">
                    <div class="home-tit">
                        <p>Blog & Articles</p>
                        <h2><span>Related posts</span></h2>
                        <span class="leaf1"></span>
                    </div>
                    <div class="cus-revi">
                        <ul class="slider3">
                            @foreach ($related_posts as $related)
                                <li>
                                    <div class="blog-home-box">
                                        <div class="im">
                                            <img src="{{ asset($related->image) }}" alt="" loading="lazy">
                                        </div>
                                        <div class="txt">
                                            @foreach ($related->tags as $tag)
                                                <span class="blog-cate">{{ $tag->name }}</span>
                                            @endforeach
                                            <h2>{{ $related->title }}</h2>
                                            @if ($related->author_image && $related->author_name)
                                                <div class="blog-info">
                                                    <div class="blog-pro-info">
                                                        <img src="{{ asset($related->author_image) }}" alt=""
                                                            loading="lazy">
                                                        <h5>{{ $related->author_name }} <span>Author</span></h5>
                                                    </div>
                                                </div>
                                            @endif
                                            <a href="/blog-details/{{ $related->id }}" class="fclick"></a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
