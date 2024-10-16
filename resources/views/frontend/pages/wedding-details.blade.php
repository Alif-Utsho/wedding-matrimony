@extends('frontend.layouts.master')
@section('content')
    <section>
        <div class="wedd @if ($wedding->video_based) pg-wedd-vid @endif m-tp">
            <div class="container">
                <div class="row">
                    <div class="ban-wedd">
                        <h2>{{ $wedding->couple_name }}</h2>
                        <p>{{ $wedding->description }}</p>

                        <div class="wedd-info">
                            <ul>
                                <li><i class="fa fa-calendar-o"
                                        aria-hidden="true"></i><span>{{ \Carbon\Carbon::parse($wedding->date)->format('d M Y') }}</span>
                                </li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                        href="javascript:void();">{{ $wedding->location }}</a></li>
                            </ul>
                        </div>
                        @if ($wedding->video_based)
                            <div class="wedd-vid">
                                <img src="{{ asset($wedding->thumbnail) }}" alt="">
                                {!! $wedding->video !!}
                                <span class="vid-play"><i class="fa fa-play" aria-hidden="true"></i></span>
                            </div>
                            <div class="wedd-vid-tree">
                                <span class="wedd-vid-tre-1"></span>
                                <span class="wedd-vid-tre-2"></span>
                            </div>
                        @else
                            <div class="wedd-deco">
                                <div class="pho-frame pho-frame2">
                                    <img src="{{ asset($wedding->image1) }}" alt="">
                                    <span>Michael Jessica</span>
                                </div>
                                <div class="pho-frame pho-frame1">
                                    <img src="{{ asset($wedding->image2) }}" alt="">
                                </div>
                            </div>
                            <div class="wedd-frame">
                                <img src="{{ asset($wedding->image3) }}" alt="">
                            </div>
                            <div class="wedd-ban-leaf">
                                <span class="wedd-leaf-1"></span>
                                <span class="wedd-leaf-2"></span>
                                <span class="wedd-leaf-3"></span>
                                <span class="wedd-leaf-4"></span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->




    <!-- START -->
    <section>
        <div class="foot-box">
            <div class="container">
                <div class="row">
                    <div class="inn">
                        <ul>
                            <li>
                                <div class="foot-inn">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                    <div>
                                        <span>Phone</span>
                                        <h5>+01 2312 2143</h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="foot-inn">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <div>
                                        <span>Reservation</span>
                                        <h5>Count: 1,000+</h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="foot-inn">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <div>
                                        <span>City</span>
                                        <h5>NewYork</h5>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="wedd-dat">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="save-txt">
                            <h4>Our story</h4>
                            <h2>Save the date</h2>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="save-im">
                            @foreach ($wedding->stories as $story)
                                <div class="inn">
                                    <img src="{{ asset($story->image) }}" alt="">
                                    <div class="desc">
                                        <span>{{ $story->date }}</span>
                                        <h4>{{ $story->title }}</h4>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- START -->
    <section>
        <div class="wedd-gall">
            <div class="">
                <div class="gall-inn">
                    <div class="home-tit">
                        <p>collections</p>
                        <h2><span>Photo gallery</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>
                    {{-- @foreach ($wedding->galleries as $gallery)
                    @if ($loop->iteration % 2 == 0)
                        <div class="col-md-3">
                            <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                                <img src="{{ asset($gallery->image) }}" class="gal-siz-2" alt="">
                                <div class="txt">
                                    <span>Wedding</span>
                                    <h4>{{ $wedding->couple_name }}</h4>
                                </div>
                            </div>
                            <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                                <img src="{{ asset($gallery->image) }}" class="gal-siz-1" alt="">
                                <div class="txt">
                                    <span>Wedding</span>
                                    <h4>{{ $wedding->couple_name }}</h4>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-2">
                            <div class="gal-im animate animate__animated animate__slow" data-ani="animate__flipInX">
                                <img src="{{ asset($gallery->image) }}" class="gal-siz-1" alt="">
                                <div class="txt">
                                    <span>Wedding</span>
                                    <h4>{{ $wedding->couple_name }}</h4>
                                </div>
                            </div>
                            <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                                <img src="{{ asset($gallery->image) }}" class="gal-siz-2" alt="">
                                <div class="txt">
                                    <span>Wedding</span>
                                    <h4>{{ $wedding->couple_name }}</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach --}}

                    {{-- @foreach ($wedding->galleries->chunk(2) as $galleryPair)
                        <div class="{{ $loop->iteration % 2 == 0 ? 'col-md-3' : 'col-md-2' }}">
                            @foreach ($galleryPair as $gallery)
                                <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                                    <img src="{{ asset($gallery->image) }}" class="{{ $loop->iteration % 2 == 0 ? 'gal-siz-2' : 'gal-siz-1' }}" alt="">
                                    <div class="txt">
                                        <span>Wedding</span>
                                        <h4>{{ $wedding->couple_name }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach --}}

                    @foreach ($wedding->galleries->chunk(2) as $chunkIndex => $galleryChunk)
                        @if ($chunkIndex % 2 == 0)
                            <!-- Use col-md-2 for odd chunks -->
                            <div class="col-md-2">
                                @foreach ($galleryChunk as $gallery)
                                    <div class="gal-im animate animate__animated animate__slower"
                                        data-ani="animate__flipInX">
                                        <img src="{{ asset($gallery->image) }}" class="gal-siz-{{ $loop->first ? 1 : 2 }}"
                                            alt="">
                                        <div class="txt">
                                            <span>Wedding</span>
                                            <h4>{{ $wedding->couple_name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <!-- Use col-md-3 for even chunks -->
                            <div class="col-md-3">
                                @foreach ($galleryChunk as $gallery)
                                    <div class="gal-im animate animate__animated animate__slower"
                                        data-ani="animate__flipInX">
                                        <img src="{{ asset($gallery->image) }}" class="gal-siz-{{ $loop->first ? 2 : 1 }}"
                                            alt="">
                                        <div class="txt">
                                            <span>Wedding</span>
                                            <h4>{{ $wedding->couple_name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
