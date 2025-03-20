<section class="content-section no-bottom-spacing">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="section-title">
                    <span class="h6">{{$module->getTranslatedAttribute('top')}}</span>
                    <h2>{{$module->getTranslatedAttribute('title')}}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <figure class="side-image">
                    <img src="{{asset($module->image)}}" alt="{{$module->getTranslatedAttribute('title')}}">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="side-content right">
                    {!! $module->data()->getTranslatedAttribute('vision') !!}
                    @if($module->getTranslatedAttribute('url'))
                    <a href="{{$module->getTranslatedAttribute('url')}}" class="custom-button">{{$module->getTranslatedAttribute('button')}}</a>
                    @endif
                </div>
            </div>
        </section>