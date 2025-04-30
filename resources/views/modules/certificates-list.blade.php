<div class="rts-gallery-area rts-section-gap">
    <div class="container">
        <div class="section-inner">
            <div class="row g-24 mb--25 justify-content-center">
                @forelse ($Page->data() as $certificate)
                <div class="col-lg-4">
                    <div class="gallery-wrapper-style-2">
                        <img src="{{Voyager::image($certificate->file)}}" alt="{{$certificate->getTranslatedAttribute('title')}}">
                        <a href="{{Voyager::image($certificate->file)}}" target="_blank" class="gallery-image">
                            <div class="item-overlay"></div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        {{__('certificates.no_certificates')}}
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</div>