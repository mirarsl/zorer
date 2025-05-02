@extends('layout.master')
@section('modules')
@if (isset($View) && View::exists('modules.' . $View))
@include('modules.' . $View, ['module' => $Page])
@endif
@isset($Meta->modules)
@forelse ($Meta->modules as $module)
@if (View::exists('modules.' . $module->slug))
@include('modules.' . $module->slug, ['module' => $module])
@endif
@empty
@endforelse
@endisset
@endsection
@section('content')
<div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg_image" @if($Meta->image) style="background-image: url({{Voyager::image($Meta->image)}})" @elseif(isset($Meta->color)) style="background-color:{{$Meta->color}}" @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{$Page->getTranslatedAttribute('title')}}</h1>
                    @if($Page->getTranslatedAttribute('hero'))
                    <p class="disc">{{$Page->getTranslatedAttribute('hero')}}</p>
					@elseif($Page->getTranslatedAttribute('spot'))
					<p class="disc">{{$Page->getTranslatedAttribute('spot')}}</p>
					@else
					<p class="disc"></p>
                    @endif
                    {!! Breadcrumbs::view('breadcrumbs.index','page') !!}
                    {!! Breadcrumbs::view('breadcrumbs::json-ld','page') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@yield('details')
@yield('modules')
@endsection
