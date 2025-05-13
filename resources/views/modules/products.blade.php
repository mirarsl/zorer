<div class="rts-offer-provide-section rts-section-gap bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-mid-wrapper-home-two" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                    <span class="pre">{{$module->top}}</span>
                    <h2 class="title">{{$module->title}}</h2>
                </div>
            </div>
        </div>
        <div class="row mt--15 g-24 justify-content-center">
            @foreach ($module->data() as $product)
            <div class="col-lg-4 col-md-6">
                <div class="rts-single-offer">
                    <a href="{{route('product',$product->slug)}}" class="thumbnail">
                        <img src="{{Voyager::image($product->image)}}" alt="{{$product->title}}">
                    </a>
                    <div class="content-wrapper">
                        <a href="{{route('product',$product->slug)}}">
                            <h3 class="title">{{$product->title}}</h3>
                        </a>
                        <p class="disc">
                            {!! $product->spot !!}
                        </p>
                        <a href="{{route('product',$product->slug)}}" class="rts-btn btn-transparent-service">Detaylı Bilgi<i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>