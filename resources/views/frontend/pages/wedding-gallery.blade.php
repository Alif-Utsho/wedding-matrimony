@extends('frontend.layouts.master')
@section('content')
    <!-- START -->
    <section>
        <div class="wedd-gall home-wedd-gall">
            <div class="">
                <div class="gall-inn">
                    <div class="home-tit">
                        <p>collections</p>
                        <h2><span>Photo gallery</span></h2>
                        <span class="leaf1"></span>
                        <span class="tit-ani-"></span>
                    </div>

                    @foreach ($galleries->chunk(2) as $chunkIndex => $galleryChunk)
                        @if ($chunkIndex % 2 == 0)
                            <!-- Use col-md-2 for odd chunks -->
                            <div class="col-md-2">
                                @foreach ($galleryChunk as $gallery)
                                    <div class="gal-im animate animate__animated animate__slower" data-ani="animate__flipInX">
                                        <img src="{{ asset($gallery->image) }}" class="gal-siz-{{ $loop->first ? 1 : 2 }}"
                                            alt="">

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
