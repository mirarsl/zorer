<div class="rts-about-area rts-section-gapBottom">
    <div class="container">
        <div class="right--div bg-white row">
            <div class="col-xl-6 col-lg-12 p-0">
                <div class="about-one-left-wrapper   reveal-item overflow-hidden aos-init">
                    <div class="reveal-item overflow-hidden aos-init">
                        <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end">
                        </div>
                        <img src="{{Voyager::image($module->image)}}" alt="{{$module->getTranslatedAttribute('title')}}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="about-one-right-wrapper">
                    <div class="elecate-left-title">
                        <span>{{$module->getTranslatedAttribute('top')}}</span>
                        <h2 class="title">{{$module->getTranslatedAttribute('title')}}</h2>
                    </div>
                    <div class="rts-tab-one-start">
                        <div class="single-tab-content-one">
                            <div class="disc">
                                {!! $module->getTranslatedAttribute('text') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>