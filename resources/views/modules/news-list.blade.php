@php
use App\Search;
$Terms = Search::where('count','>',200)->where('table','news')->orderBy('count','desc')->limit(10)->get();
if(isset(request()->search)){
    if(!session()->has('utm_code') || session()->get('utm_code') != request()->utm_code.'-'.request()->search){
        if(Search::where('term',request()->search)->where('table','news')->exists()){
            $term = Search::where('term',request()->search)->where('table','news')->first();
            $term->count++;
            $term->save();
        }else{
            $term = new Search();
            $term->table = 'news';
            $term->term = request()->search;
            $term->count = 1;
            $term->save();
        }
    }
    $news = $Page->data(6,request()->search);
    session()->put('utm_code',request()->utm_code.'-'.request()->search);
}else{
    $news = $Page->data(6);
}
@endphp
<div class="rts-blog-list-area rts-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                @foreach ($news as $item)
                <div class="blog-single-post-listing details mb--30">
                    <div class="thumbnail">
                        <img src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}">
                    </div>
                    <div class="blog-listing-content">
                        <div class="user-info">
                            <div class="single">
                                <i class="far fa-clock"></i>
                                <span>{{$item->created_at->translatedFormat('d F Y')}}</span>
                            </div>
                        </div>
                        <a href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}">
                            <h2 class="h3 title">{{$item->getTranslatedAttribute('title')}}</h2>
                        </a>
                        <p class="disc para-1 mb--30">
                            {{$item->getTranslatedAttribute('spot')}}
                        </p>
                        <a class="rts-btn btn-primary mt--0" href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}">Devamını Gör <i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 col-12 pl-b-list-controler">
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
                                <form class="d-flex" action="{{route('page',$Page->getTranslatedAttribute('slug'))}}" method="get">
                                    <input type="hidden" name="utm_code" value="{{csrf_token()}}">
                                    <input type="text" name="search" placeholder="{{__('search_placeholder')}}" value="{{request()->search}}">
                                    <button type="submit">{{__('search_button')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(count($Terms) > 0)
                    <div class="rts-single-wized">
                        <div class="wized-header">
                            <h2 class="h5 title">{{__('news.popular_tags')}}</h2>
                        </div>
                        <div class="wized-body">
                            <div class="tags-wrapper">
                                @foreach ($Terms as $item)
                                <a href="{{route('page', ['slug' => $Page->getTranslatedAttribute('slug'),'utm_code' => csrf_token(),'search'=>$item->term])}}">{{$item->term}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt--30">
            <div class="col-lg-12">
                <div class="rts-elevate-pagination">
                    {{$news->links('pagination.index')}}
                </div>
            </div>
        </div>
    </div>
</div>


@if(isset(request()->search))
@section('language')
<li>
    <a href=""><i class="lni lni-language"></i> {{LaravelLocalization::getCurrentLocaleNative()}}</a>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, route('page', ['slug' => $Page->fullSlug($localeCode), 'search'=>request()->search, 'utm_code' => request()->utm_code ])) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
    </ul>
</li>
@endsection
@endif