<div class="rts-company-feature rts-section-gapBottom bg-white">
    <div class="container">
        @foreach ($module->data() as $item)
        <div class="row g-0 align-items-center">
            @if($loop->index % 2 == 1)
            <div class="col-lg-6">
                <div class="thumbnail-feature-five">
                    <div class="thumbnail">
                        <div class="reveal-item overflow-hidden aos-init">
                            <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
                            <img src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($loop->index % 2 == 0)
            <div class="col-lg-6 pr--80 pr_md--0 pr_sm--0 mt_md--50 mt_sm--50 order-xl-1 order-lg-1 order-md-2 -order-sm-2 order-2">
            @else
            <div class="col-lg-6 pl--80 pl_md--0 pl_sm--0 mt_md--50 mt_sm--50">
            @endif
                <div class="featurte-1stwrapper @if($loop->last) last @endif">
                    <div class="title-left-wrapper-home-two sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                        <h2 class="title mt--10">{{$item->getTranslatedAttribute('title')}}</h2>
                    </div>
                    <div class="inner-content-feature-five-wrapper">
                        <div class="disc">{!! $item->getTranslatedAttribute('text') !!}</div>
                    </div>
                </div>
            </div>
            @if($loop->index % 2 == 0)
            <div class="col-lg-6 order-xl-2 order-lg-2 order-md-1 -order-sm-1 order-1">
                <div class="thumbnail-feature-five">
                    <div class="thumbnail">
                        <div class="reveal-item overflow-hidden aos-init">
                            <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
                            <img class="mb_md--50 mb_sm--50" src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>