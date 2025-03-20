@if($module->data()->count() > 0)
<div class="rts-blog-area rts-section-gap2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-mid-wrapper-home-two">
                    <span class="pre">{{ $module->top }}</span>
                    <h2 class="title">{{ $module->title }}</h2>
                </div>
            </div>
        </div>
        <div class="row g-24 mt--10 justify-content-center">
            @foreach ($module->data() as $news)
            <div class="col-lg-4 col-md-6">
                <div class="blog-single-two-wrapper">
                    <div class="image-area">
                        <a href="{{route('news',$news->slug)}}" class="thumbnail">
                            <img src="{{Voyager::image($news->image)}}" alt="{{$news->title}}">
                        </a>
                        <div class="date-area">
                            <div class="date">
                                <span class="day">{{$news->created_at->translatedFormat('d')}}</span>
                                <span class="month">{{$news->created_at->translatedFormat('F')}}</span>
                            </div>
                            <div class="year">
                                <span class="year">{{$news->created_at->translatedFormat('Y')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="inner">
                        <a href="{{route('news',$news->slug)}}">
                            <h3 class="title">{{$news->title}}</h3>
                        </a>
                        <a href="{{route('news',$news->slug)}}" class="btn-read-more-blog">Devamını Gör <i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif