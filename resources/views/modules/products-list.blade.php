<div class="rts-offer-provide-section rts-section-gap">
    <div class="container">
        <div class="row g-24">
            @forelse ($Page->data() as $product)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="rts-single-offer">
                    <a href="{{route('product', $product->getTranslatedAttribute('slug'))}}" class="thumbnail">
                        <img src="{{Voyager::image($product->image)}}" alt="{{$product->getTranslatedAttribute('title')}}">
                    </a>
                    <div class="content-wrapper">
                        <a href="{{route('product', $product->getTranslatedAttribute('slug'))}}">
                            <h2 class="h5 title">{{$product->getTranslatedAttribute('title')}}</h2>
                        </a>
                        <p class="disc">
                            {{$product->getTranslatedAttribute('spot')}}
                        </p>
                        <a href="{{route('product', $product->getTranslatedAttribute('slug'))}}" class="rts-btn btn-transparent-service">Detay<i class="fa-light fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Eklenmiş ürün bulunamadı.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>