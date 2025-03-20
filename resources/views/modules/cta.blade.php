<div class="rts-cta-area">
    <div class="container container-cta-150">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="path-cta-left">
                    <h2 class="title">{{ $module->title }}</h2>
                    <div class="disc">{!! $module->text !!}</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="path-call-area">
                    <div class="icon">
                        <i class="fa-regular fa-phone-office"></i>
                    </div>
                    <div class="detail">
                        <span>Bizi Ara</span>
                        <a href="tel:{{ $sharedContent['Contact']->phone1 }}" class="number">
                            {{ $sharedContent['Contact']->phone1 }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>