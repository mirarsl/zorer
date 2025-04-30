<div class="rts-about-area-about vision rts-section-gap">
    <div class="container pb--45 plr_sm--15">
        <img class="vision-background" src="{{Voyager::image($Page->data()->first()->image2)}}" alt="{{$Page->getTranslatedAttribute('title')}}">
        <div class="vision-wrapper">
            <div class="row">
                <div class="col-lg-6 vision-main-wrapper">
                    <div class="about-a-p-cont text-right">
                        <div class="about-inner-wrapper-inner">
                            <div class="title-three-left d-flex align-items-center gap-3 justify-content-end">
                                <h2 class="title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800">
                                    {{__('about.mission')}}
                                </h2>
                                <img width="48" height="48" src="/assets/mission.svg" alt="{{__('about.mission')}}">
                            </div>
                            <div class="main-content-area-about-p">
                                <div class="disc">
                                    {!! $Page->data()->first()->getTranslatedAttribute('mission') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 vision-main-wrapper text-left">
                    <div class="about-a-p-cont">
                        <div class="about-inner-wrapper-inner">
                            <div class="title-three-left d-flex align-items-center gap-3 justify-content-start">
                                <img width="48" height="48" src="/assets/vision.svg" alt="{{__('about.vision')}}">
                                <h2 class="title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800">
                                    {{__('about.vision')}}
                                </h2>
                            </div>
                            <div class="main-content-area-about-p">
                                <div class="disc">
                                    {!! $Page->data()->first()->getTranslatedAttribute('vision') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>