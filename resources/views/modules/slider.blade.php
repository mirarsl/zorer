<div class="rts-banner-area-two bg-primary">
    <div class="banner-image-left">
        <img src="{{Voyager::image($module->image)}}" alt="{{$module->top}}">
    </div>
    <div class="banner-image-right">
        <div class="banner-content">
            <span data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" style="display: block;">{{$module->top}}</span>
            <h2 class="title" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                {{$module->title}}
            </h2>
            <div class="short-disc" data-sal="slide-up" data-sal-delay="350" data-sal-duration="800">{!! $module->text !!}</div>
            @if($module->button && $module->url)
            <a href="{{$module->url}}" class="rts-btn btn-seconday">{{$module->button}}</a>
            @endif
        </div>
    </div>
</div>