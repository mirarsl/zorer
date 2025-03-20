<section class="content-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title text-left">
                    <span class="h6">{{$module->getTranslatedAttribute('top')}}</span>
                    <h2>{{$module->getTranslatedAttribute('title')}}</h2>
                </div>
                <div class="side-content left">
                    <div class="side-image">
                        <img src="{{asset($module->image)}}" alt="{{$module->getTranslatedAttribute('top')}}"> 
                        <div class="big-note-box">
                            {!! $module->data()->getTranslatedAttribute('mission') !!}
                        </div>
                    </div>
                    {!! $module->data()->getTranslatedAttribute('about') !!}
                    <a class="custom-button" href="{{$module->getTranslatedAttribute('url')}}">{{$module->getTranslatedAttribute('button')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>