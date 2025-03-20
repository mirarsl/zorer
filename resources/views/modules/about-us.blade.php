<div class="rts-service-two-col rts-section-gap2Bottom">
    <div class="container-full">
        <div class="main-wrapper-sevice-col-2">
            <div class="left-image">
                <img src="{{Voyager::image($module->data()->image1)}}" alt="{{$module->data()->title}}">
            </div>
            <div class="path-right">
                <div class="content-wrapper">
                    <div class="title-mid-wrapper-home-two left">
                        <span class="pre" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" style="display: block;">{{$module->top}}</span>
                        <h2 class="title" data-sal="slide-up" data-sal-delay="350" data-sal-duration="800">{{$module->title}}</h2>
                    </div>
                    <div class="single-wrapper">
                        <div class="disc">{!! $module->data()->short_about !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>