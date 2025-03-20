@extends('pages.details')
@section('details')
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="blog-post">
                    <figure><img src="{{asset($Page->image)}}" alt="{{$Page->getTranslatedAttribute('title')}}"></figure>
                    <div class="post-content">
                        <span class="post-date">{{$Page->created_at->translatedFormat('j F Y')}}</span>
                        <h2 class="post-title">{{$Page->getTranslatedAttribute('title')}}</h2>
                        {!!$Page->getTranslatedAttribute('text')!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <aside class="sidebar position-sticky">
                    <div class="widget">
                        <h3 class="widget-title">{{__('tariffe.malzemeler')}}</h3>
                        {!! $Page->getTranslatedAttribute('materials') !!}
                        @if($Page->getTranslatedAttribute('percent'))
                            <h4 class="widget-title small">{{__('tariffe.howmuch')}} : {{$Page->getTranslatedAttribute('percent')}}</h4>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
