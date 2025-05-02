@extends('layout.master')
@push('body_class','page-header ')
@section('content')
{!! Breadcrumbs::view('breadcrumbs::json-ld','page') !!}
<div class="rts-404-area ptb--200 ptb_md--100 ptb_sm--80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper-404 text-center">
                    <div class="thumbnail">
                        <img width="500px" src="/assets/404.webp" alt="404">
                    </div>
                    <h2 class="title mt--40">
                        {{__('404.title')}}
                    </h2>
                    <p class="disc">
                        {{__('404.description')}}
                    </p>
                    <a class="rts-btn btn-primary" href="{{route('home')}}">
                        {{__('404.button')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection