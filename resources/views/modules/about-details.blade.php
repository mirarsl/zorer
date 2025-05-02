<div class="rts-about-area-about rts-section-gap">
    <div class="container pb--45 plr_sm--15">
        <div class="row">
            <div class="col-lg-5">
                <div class="thumbnail-area-about">
                    <img src="{{Voyager::image($Page->data()->first()->image2)}}" alt="about-area">
                    <a class="rts-btn btn-primary" href="{{route('page',['slug'=>__('about.link')])}}">{{__('about.title')}}</a>
                </div>
            </div>
            <div class="col-lg-7 about-a-p-cont">
                <div class="about-inner-wrapper-inner">
                    <div class="title-three-left">
                        <span class="pre-title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800" style="display: block;">
                            {{ $Page->getTranslatedAttribute('title') }}
                        </span>
                        <h2 class="title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800">
                            {{setting('site.title')}}
                        </h2>
                    </div>
                    <div class="main-content-area-about-p">
                        {!! $Page->data()->first()->about !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="bg-text">
            <h2 class="title">{{$Page->getTranslatedAttribute('top')}}</h2>
        </div>
    </div>
</div>