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
<header class="page-header" @if($Meta->image) data-background="{{asset($Meta->image)}}" @elseif(isset($Meta->color)) style="background-color:{{$Meta->color}}" @endif data-stellar-background-ratio="0.7">
	<div class="container">
		<h1>{{$Page->getTranslatedAttribute('title')}}</h1>
		<p>{{$Page->getTranslatedAttribute('hero') != '' ? $Page->getTranslatedAttribute('hero') : $Page->getTranslatedAttribute('spot')}}</p>
		{!! Breadcrumbs::view('breadcrumbs::bootstrap5','page') !!}
		{!! Breadcrumbs::view('breadcrumbs::json-ld','page') !!}
	</div>
	<div class="parallax-element" data-stellar-ratio="2"></div>
</header>
@yield('details')
@yield('modules')
@endsection
