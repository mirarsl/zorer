@extends('pages.details')
@section('details')
<div class="rts-service-area rts-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="order-xl-1 order-0 col-xl-8 col-md-12 col-sm-12 col-12 plr_sm--20">
                <div class="service-detials-step-1">
                    <div class="thumbnail">
                        <img src="{{Voyager::image($Page->image)}}" alt="{{$Page->getTranslatedAttribute('title')}}">
                    </div>
                    <h2 class="title">{{$Page->getTranslatedAttribute('title')}}</h2>
                    <div class="disc">
                        {!! $Page->getTranslatedAttribute('text') !!}
                    </div>
                </div>
                <div class="service-detials-step-3 mt--70 mt_md--50">
                    <div class="row g-5 align-items-center">
                        @if($Page->icon)
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="thumbnail sm-thumb-service">
                                <img src="{{Voyager::image($Page->icon)}}" alt="{{$Page->getTranslatedAttribute('title')}}">
                            </div>
                        </div>
                        @endif
                        @if ($Page->getTranslatedAttribute('table'))
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 mb_md--20 mb_sm--20">
                            <h3 class="title">{{__('products.table')}}</h3>
                            <div class="table disc">
                                {!! $Page->getTranslatedAttribute('table') !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="order-xl-0 order-1 col-xl-4 col-md-12 col-sm-12 col-12 sd-pad-r">
                <div class="rts-single-wized Categories">
                    <div class="wized-header">
                        <h2 class="title">{{__('products.other')}}</h2>
                    </div>
                    <div class="wized-body">
                        <ul class="single-categories">
                            @foreach ($Other as $item)
                            <li @if($item->id == $Page->id) class="active" @endif><a href="{{route('product',$item->getTranslatedAttribute('slug'))}}">{{$item->getTranslatedAttribute('title')}} <i class="far fa-long-arrow-right"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if($Page->gallery)
                <div class="rts-single-wized download service">
                    <div class="wized-header">
                        <h2 class="h5 title">{{__('products.catalogue')}}</h2>
                    </div>
                    <div class="wized-body">
                        @php
                            $gallery = json_decode($Page->gallery);
                        @endphp
                        @foreach ($gallery as $item)
                        <div class="single-download-area">
                            @php
                                $file = pathinfo($item->download_link);
                                $extension = $file['extension'];
                            @endphp
                            @if($extension == 'pdf')
                            <img src="/assets/images/service/icon/07.svg" alt="Business_downlaod">
                            @else
                            <img src="/assets/images/service/icon/08.svg" alt="Business_downlaod">
                            @endif
                            <div class="mid">
                                <span class="title">{{$item->original_name}}</span>
                            </div>
                            <a target="_blank" class="rts-btn btn-primary" href="{{Voyager::image($item->download_link)}}"><i class="fal fa-arrow-right"></i></a>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection