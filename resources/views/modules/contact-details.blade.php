<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-left">
                    <span class="h6">{{setting('site.title')}}</span>
                    <h2>{{$Page->getTranslatedAttribute('hero')}}</h2>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="consumer">
                    <img src="/images/support.png" alt="{{__('contact.consumer1')}}">
                    <h3>{{__('contact.consumer1')}}</h3>
                    <p>{{__('contact.consumer1.description')}}</p>
                    <a class="custom-button" href="{{route('page',__('contact.consumer1.button.link'))}}">{{__('contact.consumer1.button')}}</a>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="consumer">
                    <img src="/images/restourant.png" alt="{{__('contact.consumer2')}}">
                    <h3>{{__('contact.consumer2')}}</h3>
                    <p>{{__('contact.consumer2.description')}}</p>
                    <a class="custom-button" href="{{route('page',__('contact.consumer2.button.link'))}}">{{__('contact.consumer2.button')}}</a>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="consumer">
                    <img src="/images/perakende.png" alt="{{__('contact.consumer3')}}">
                    <h3>{{__('contact.consumer3')}}</h3>
                    <p>{{__('contact.consumer3.description')}}</p>
                    <a class="custom-button" href="{{route('page',__('contact.consumer3.button.link'))}}">{{__('contact.consumer3.button')}}</a>
                </div>
            </div>
            <div class="col-lg-8 mb-3">
                <div class="contact-form">
                    <h3>{{$sharedContent['Contact']->getTranslatedAttribute('contact1')}}</h3>
                    <div class="form">
                        @if($sharedContent['Contact']->phone1)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon01.png" alt="{{__('contact.phone')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.phone')}}</h4>
                                <a href="tel:{{$sharedContent['Contact']->phone1}}">{{$sharedContent['Contact']->phone1}}</a>
                            </div>
                        </div>
                        @endif
                        @if($sharedContent['Contact']->email1)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon02.png" alt="{{__('contact.email')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.email')}}</h4>
                                <a href="mailto:{{$sharedContent['Contact']->email1}}">{{$sharedContent['Contact']->email1}}</a>
                            </div>
                        </div>
                        @endif
                        @if($sharedContent['Contact']->address1)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon03.png" alt="{{__('contact.address')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.address')}}</h4>
                                <p>{{$sharedContent['Contact']->address1}}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="contact-form">
                    <h3>{{$sharedContent['Contact']->getTranslatedAttribute('contact2')}}</h3>
                    <div class="form">
                        @if($sharedContent['Contact']->phone2)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon01.png" alt="{{__('contact.phone')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.phone')}}</h4>
                                <a href="tel:{{$sharedContent['Contact']->phone2}}">{{$sharedContent['Contact']->phone2}}</a>
                            </div>
                        </div>
                        @endif
                        @if($sharedContent['Contact']->email2)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon02.png" alt="{{__('contact.email')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.email')}}</h4>
                                <a href="mailto:{{$sharedContent['Contact']->email2}}">{{$sharedContent['Contact']->email2}}</a>
                            </div>
                        </div>
                        @endif
                        @if($sharedContent['Contact']->address2)
                        <div class="contact-box">
                            <figure><img src="images/contact-icon03.png" alt="{{__('contact.address')}}"></figure>
                            <div class="content">
                                <h4>{{__('contact.address')}}</h4>
                                <p>{{$sharedContent['Contact']->address2}}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($sharedContent['Contact']->getTranslatedAttribute('iframe_url'))
<div class="google-maps">
    <iframe src="{{$sharedContent['Contact']->getTranslatedAttribute('iframe_url')}}" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@endif