@extends('pages.details')
@section('details')
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="{{$Other->count() > 0 ? 'col-lg-8' : 'col-lg-12'}}">
                <div class="blog-post">
                    <figure><img src="{{asset($Page->image)}}" alt="{{$Page->title}}"></figure>
                    <div class="post-content">
                        <span class="post-date">{{$Page->created_at->translatedFormat('j F Y')}}</span>
                        <p>{{$Page->getTranslatedAttribute('spot')}}</p>
                        <h2 class="post-title">{{$Page->getTranslatedAttribute('title')}}</h2>
                        {!! $Page->getTranslatedAttribute('text') !!}
                    </div>
                </div>
            </div>
            @if ($Other->count() > 0)
            <div class="col-lg-4">
                <aside class="sidebar position-sticky">
                    <div class="widget white-bg">
                        <h2 class="widget-title">{{__('news.other')}}</h2>
                        <ul class="categories">
                            @foreach ($Other as $item)
                            <li><a href="{{route('news',['slug'=>$item->getTranslatedAttribute('slug')])}}">{{$item->getTranslatedAttribute('title')}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
@push('links')
<style>
    .page-header .container h1{
        font-size: 60px;
    }
</style>
@endpush