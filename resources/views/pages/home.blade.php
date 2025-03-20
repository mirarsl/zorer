@extends('layout.master')
@section('content')
{!! Breadcrumbs::view('breadcrumbs::json-ld','home') !!}
@foreach ($Page->modules as $module)
@if (View::exists('modules.' . $module->slug))
@include('modules.' . $module->slug, ['module' => $module])
@else
{{-- @include('modules.default', ['module' => $module]) --}}
@endif
@endforeach

@endsection
@push('page_codes')
{!! $Page->page_codes !!}
@endpush
