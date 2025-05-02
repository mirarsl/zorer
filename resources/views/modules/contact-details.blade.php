<div class="rts-contact-area-m rts-section-gap">
    <div class="container">
        <div class="row g-24">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-contact-one-inner">
                    <div class="content">
                        <div class="icone">
                            <img src="/assets/images/contact/shape/01.svg" alt="">
                        </div>
                        <div class="info">
                            <span>{{__('contact.email')}}</span>
                            <a href="mailto:{{$sharedContent['Contact']->email1}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->email1}}</div>
                            </a>
                            @if ($sharedContent['Contact']->email2)
                            <a href="mailto:{{$sharedContent['Contact']->email2}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->email2}}</div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-contact-one-inner">
                    <div class="content">
                        <div class="icone">
                            <img src="/assets/images/contact/shape/02.svg" alt="">
                        </div>
                        <div class="info">
                            <span>{{__('contact.phone')}}</span>
                            <a href="tel:{{$sharedContent['Contact']->phone1}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->phone1}}</div>
                            </a>
                            @if ($sharedContent['Contact']->phone2)
                            <a href="tel:{{$sharedContent['Contact']->phone2}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->phone2}}</div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-contact-one-inner">
                    <div class="content">
                        <div class="icone">
                            <img src="/assets/images/contact/shape/03.svg" alt="">
                        </div>
                        <div class="info">
                            <span>{{__('contact.address')}}</span>
                            <a href="https://maps.google.com/?q={{$sharedContent['Contact']->address1}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->address1}}</div>
                            </a>
                            @if ($sharedContent['Contact']->address2)
                            <a href="https://maps.google.com/?q={{$sharedContent['Contact']->address2}}">
                                <div class="h6 mb-1">{{$sharedContent['Contact']->address2}}</div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
