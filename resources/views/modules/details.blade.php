<div class="rts-about-area-about rts-section-gap">
    <div class="container">
        <div class="about-inner-wrapper-inner">
            <div class="title-three-left">
                <span class="pre-title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800" style="display: block;">
                    {{setting('site.title')}}
                </span>
                <h2 class="title" data-sal="slide-up" data-sal-delay="100" data-sal-duration="800">
                    {{ $Page->getTranslatedAttribute('title') }}
                </h2>
            </div>
            <div class="main-content-area-about-p">
                {!! $Page->getTranslatedAttribute('text') !!}
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .main-content-area-about-p h2{
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 10px;
        color: var(--color-secondary);
    }
    .main-content-area-about-p p{
        margin-bottom: 10px;
    }
</style>
@endpush