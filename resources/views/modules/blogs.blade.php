@if ($module->data()->count() > 0)
<div class="rts-blog-four-area rts-section-gap bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-mid-wrapper-home-two" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                    <span class="pre">{{$module->getTranslatedAttribute('top')}}</span>
                    <h2 class="title mt--10">{{$module->getTranslatedAttribute('title')}}</h2>
                </div>
            </div>
        </div>
        <div class="row mt--15 g-24 justify-content-center" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
            @foreach ($module->data() as $item)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="blog-style-four">
                    <a href="{{route('blog',$item->getTranslatedAttribute('slug'))}}" class="thumbnail">
                        <img src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}">
                    </a>
                    <div class="inner-content">
                        <a class="main-title" href="{{route('blog',$item->getTranslatedAttribute('slug'))}}">
                            <h3 class="h5 title">{{$item->getTranslatedAttribute('title')}}</h3>
                            <p class="disc">
                                {!! $item->getTranslatedAttribute('spot') !!}
                            </p>
                        </a>
                        <div class="footer-area">
                            <a href="{{route('blog',$item->getTranslatedAttribute('slug'))}}" class="rts-btn btn-primary">Devamını Oku</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif