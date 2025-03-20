<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @php
                if(isset(request()->search)){
                    $news = $Page->data(12,request()->search);
                }else{
                    $news = $Page->data(12);
                }
                @endphp
                @foreach ($news as $item)
                <div class="blog-post mb-5 pb-3">
                    <figure><img src="{{asset($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}"></figure>
                    <div class="post-content">
                        <span class="post-date">{{$item->created_at->translatedFormat('j F Y')}}</span>
                        <h2 class="post-title">{{$item->getTranslatedAttribute('title')}}</h2>
                        <p>{{$item->getTranslatedAttribute('spot')}}
                        </p> <a href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}" class="custom-link">{{__('read_more')}}</a>
                    </div>
                </div>
                @endforeach

                {{$news->links()}}
            </div>
            <div class="col-lg-4">
                <aside class="sidebar position-sticky">
                    <div class="widget white-bg">
                        <h2 class="widget-title">
                            {{__('search')}}
                            @if (isset(request()->search))
                            <span>: {{request()->search}}</span>
                            @endif
                        </h2>
                        <form action="{{route('page',$Page->getTranslatedAttribute('slug'))}}" method="get">
                            <input type="search" name="search" placeholder="{{__('search_placeholder')}}" value="{{request()->search}}">
                            <input type="hidden" name="utm_code" value="{{csrf_token()}}">
                            <input class="w-100" type="submit" value="{{__('search_button')}}">
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

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