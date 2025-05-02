@extends('layout.master')
@push('body_class','page-header ')
@section('content')
<div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg_image" @if($Page->image) style="background-image: url({{Voyager::image($Page->image)}})" @elseif(isset($Page->color)) style="background-color:{{$Page->color}}" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{$Page->getTranslatedAttribute('title')}}</h1>
                    @if($Page->getTranslatedAttribute('hero'))
                    <p class="disc">{{$Page->getTranslatedAttribute('hero')}}</p>
                    @endif
                    {!! Breadcrumbs::view('breadcrumbs.index','page') !!}
                    {!! Breadcrumbs::view('breadcrumbs::json-ld','page') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rts-blog-list-area rts-section-gap">
    <div class="container">
        <div class="wized-header">
            <span class="sub"><strong>Aranan Kelime:</strong> {{$term}}</span>
            <h2 class="h5 title">Arama Sonuçları</h2>
        </div>
        <div class="rts-single-wized Categories">
            <div class="wized-body">
                @foreach ($Pages as $key => $result)
                @if($Search[$key]->count() > 0)
                <ul class="single-categories">
                    <li><h3 class="h6 title">{{$result['title']}}</h3></li>
                    @foreach ($Search[$key] as $item)
                    <li><a href="{{ route($result['route'], method_exists($item, 'fullSlug') ? $item->fullSlug() : $item->getTranslatedAttribute('slug')) }}">{{$item->getTranslatedAttribute('title')}}</a></li>
                    @endforeach
                </ul>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@yield('modules')
@endsection