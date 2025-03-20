@extends('layout.master')
@section('content')
<header class="page-header" @if($Page->image) data-background="{{asset($Page->image)}}" @elseif(isset($Page->color)) style="background-color:{{$Page->color}}" @endif data-stellar-background-ratio="0.7">
    <div class="container">
        <h1>{{$Page->getTranslatedAttribute('title')}}</h1>
        <p>{{$Page->getTranslatedAttribute('hero')}}</p>
        {!! Breadcrumbs::view('breadcrumbs::bootstrap5','page') !!}
        {!! Breadcrumbs::view('breadcrumbs::json-ld','page') !!}
    </div>
    <div class="parallax-element" data-stellar-ratio="2"></div>
</header>
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