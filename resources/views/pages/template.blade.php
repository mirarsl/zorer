@extends('layout.master')
@section('content')
<div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg_image" @if($Page->image) style="background-image: url({{Voyager::image($Page->image)}})" @elseif(isset($Page->color)) style="background-color:{{$Page->color}}" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h2 class="title">{{$Page->getTranslatedAttribute('title')}}</h2>
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

@if (!(empty($Page->data())))
@if (View::exists('modules.' . $Page->list_name))
@include('modules.' . $Page->list_name, ['module' => $Page])
@endif
@elseif($Page->list_name)
@if (View::exists('modules.' . $Page->list_name))
@include('modules.' . $Page->list_name, ['module' => $Page])
@endif
@else
@include('modules.details', ['module' => $Page])
@endif
@hasSection ('modules')
@yield('modules')
@else
@isset($Page->modules)
@forelse ($Page->modules as $module)
@if (View::exists('modules.' . $module->slug))
@include('modules.' . $module->slug, ['module' => $module])
@endif
@empty
@endforelse
@endisset
@endif
@push('page_codes')
{!! $Page->page_codes !!}
@endpush
@endsection
@section('language')
<li>
    <a href=""><i class="lni lni-language"></i> {{LaravelLocalization::getCurrentLocaleNative()}}</a>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated($localeCode, 'routes.page', ['slug' => $Page->fullSlug($localeCode)]) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
    </ul>
</li>
@endsection