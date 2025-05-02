<div class="rts-service-area rts-section-gap2">
    <div class="container">
        <div class="row g-24">
            @foreach ($module->data() as $item)
            <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-delay="{{150 * ($loop->index + 1)}}" data-sal-duration="800">
                <div class="rts-single-service-two">
                    <h2 class="h3 title">
                        <div class="h2 title-main"><span style="--addtional:'{{$item->addtional}}'" class="counter">{{$item->count}}</span></div>
                        {{$item->title}}
                    </h2>
                    <p class="disc">{{$item->pretext}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>