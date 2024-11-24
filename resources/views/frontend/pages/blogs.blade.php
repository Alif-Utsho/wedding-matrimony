@extends('frontend.layouts.master')
@section('content')
    <!-- START -->
    <section>
        <div class="inn-ban">
            <div class="container">
                <div class="row">
                    <h1>Blog & Articles</h1>
                    <p>lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <div class="lhs">
                            <div class="blog-com-tit">
                                <h2>Latest &amp; Popular</h2>
                            </div>
                            <!--BIG POST START-->

                            @foreach ($blogs as $blog)
                                <div class="blog-home-box">
                                    <div class="im">
                                        <img src="{{ asset($blog->image) }}" alt="" loading="lazy">
                                        <span
                                            class="blog-date">{{ \Carbon\Carbon::parse($blog->date)->format('d, M Y') }}</span>
                                        <div class="shar-1">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                            <ul>
                                                <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                </li>
                                                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                                </li>
                                                <li><span><i class="fa fa-link" aria-hidden="true" data-toggle="modal"
                                                            data-target="#sharepop"></i></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        @foreach ($blog->tags as $tag)
                                            <span class="blog-cate">{{ $tag->name }}</span>
                                        @endforeach

                                        <h2>{{ $blog->title }}</h2>
                                        <p>{{ $blog->short_description }}</p>
                                        @if ($blog->author_image && $blog->author_name)
                                            <div class="blog-info">
                                                <div class="blog-pro-info">
                                                    <img src="{{ asset($blog->author_image) }}" alt=""
                                                        loading="lazy">
                                                    <h5>{{ $blog->author_name }} <span>Author</span></h5>
                                                </div>
                                            </div>
                                        @endif
                                        <a href="/blog-details/{{ $blog->id }}" class="fclick"></a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="rhs">
                            <div class="blog-com-rhs">
                                <!-- SOCIAL MEDIA START-->
                                <div class="blog-soci">
                                    <h4>Social media</h4>
                                    <ul>
                                        <li><a target="_blank" href="#!" class="sm-fb-big"><b>3k</b> Facebook</a>
                                        </li>
                                        <li><a target="_blank" href="#!" class="sm-tw-big"><b>10K</b> Twitter</a>
                                        </li>
                                        <li><a target="_blank" href="#!" class="sm-li-big"><b>1k</b> Linkedin</a>
                                        </li>
                                        <li><a target="_blank" href="#!" class="sm-yt-big"><b>100K</b> Youtube</a>
                                        </li>
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
@endsection
