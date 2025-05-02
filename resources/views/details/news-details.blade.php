@extends('pages.details')
@section('details')
<div class="rts-blog-list-area rts-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                <div class="blog-single-post-listing details mb--0">
                    <div class="thumbnail">
                        <img src="{{Voyager::image($Page->image)}}" alt="{{$Page->getTranslatedAttribute('title')}}">
                    </div>
                    <div class="blog-listing-content">
                        <div class="user-info">
                            <div class="single">
                                <i class="far fa-clock"></i>
                                <span>{{$Page->created_at->translatedFormat('d F Y')}}</span>
                            </div>
                        </div>
                        <h2 class="h3 title">{{$Page->getTranslatedAttribute('title')}}</h2>
                        <div class="disc mb-5">
                            {!! $Page->getTranslatedAttribute('text') !!}
                        </div>
                        
                        <div class="row  align-items-center">
                            @if($Page->getTranslatedAttribute('tags'))
                            <div class="col-lg-6 col-md-12">
                                <div class="details-tag">
                                    <span class="h6 mb-0">Etiketler:</span>
                                    @foreach(explode(',',$Page->getTranslatedAttribute('tags')) as $item)
                                    <a href="{{route('page', ['slug' => __('links.news'),'utm_code' => csrf_token(),'search'=>$item])}}">{{$item}}</a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 col-md-12">
                                <div class="details-share">
                                    <span class="h6 mb-0">Paylaş:</span>
                                    <a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}','_blank','width=600,height=400')"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)" onclick="window.open('https://x.com/intent/tweet?url={{url()->current()}}','_blank','width=600,height=400')"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}','_blank','width=600,height=400')"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="javascript:void(0)" onclick="window.open('https://www.pinterest.com/pin/create/button/?url={{url()->current()}}','_blank','width=600,height=400')"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 col-12  pd-control-bg--40">
                <div class="thumbnail-area-about">
                    <div class="rts-single-wized search">
                        <div class="wized-header d-flex justify-content-between">
                            <h2 class="h5 title">Arama @if(isset(request()->search)) : {{request()->search}} @endif</h2>
                            @if(isset(request()->search))
                            <a class="search-clear" href="{{route('page',$Page->getTranslatedAttribute('slug'))}}" class="btn"><i class="fa-solid fa-xmark"></i></a>
                            @endif
                        </div>
                        <div class="wized-body">
                            <div class="rts-search-wrapper">
                                <form class="d-flex" action="{{route('page',['slug' => __('links.news')])}}" method="get">
                                    <input type="hidden" name="utm_code" value="{{csrf_token()}}">
                                    <input type="text" name="search" placeholder="{{__('search_placeholder')}}" value="{{request()->search}}">
                                    <button type="submit">{{__('search_button')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h2 class="h5 title">
                                {{__('news.other')}}
                            </h2>
                        </div>
                        <div class="wized-body">
                            @foreach ($Other as $item)
                            <div class="recent-post-single">
                                <div class="thumbnail">
                                    <a href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}"><img width="100" src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}"></a>
                                </div>
                                <div class="content-area">
                                    <div class="user">
                                        <i class="fal fa-clock"></i>
                                        <span>{{$item->created_at->translatedFormat('d F Y')}}</span>
                                    </div>
                                    <a class="post-title" href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}">
                                        <h3 class="h6 title">{{$item->getTranslatedAttribute('title')}}</h3>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('links')
<style>
    .breadcrumb-inner .title{
        font-size: 60px;
    }
</style>
@endpush