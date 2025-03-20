@foreach($items as $menu_item)
<div class="single-footer-wized-two pages" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
    <div class="footer-header-two pages">
        <h2 class="title">{{$menu_item->getTranslatedAttribute('title')}}</h2>
        <div class="pages">
            @if (count($menu_item->children) > 0 || isset($menu_item->app_model))
            @if (count($menu_item->children) > 0)	
            <ul>
                @foreach ($menu_item->children as $item)
                <li><a href='{{ !isset($item->app_model) ?  (isset($item->route) ? $item->link() : (isset($item->parameters) ? $item->parameters->{app()->getLocale()} : 'javascript:void(0);') ) : (isset($item->parameters) ? route('page',$item->parameters->slug) : 'javascript:void(0);') }}'><i class="fa-solid fa-arrow-right"></i> {{$item->getTranslatedAttribute('title')}}</a></li>
                @endforeach
            </ul>
            @else
            <ul class="pages">
                @php
                $model = app($menu_item->app_model);
                if(isset($menu_item->model_scopes) && is_string($menu_item->model_scopes)){
                    foreach (json_decode($menu_item->model_scopes) as $key => $value) {
                        $model = $model->$value();
                    }
                }
                if(isset($menu_item->model_limit)){
                    $model->limit($menu_item->model_limit,0);
                }
                @endphp
                @foreach ($model->get() as $item)
                <li><h3><a href="{{route($menu_item->route,$item->getTranslatedAttribute('slug'))}}" target="{{$menu_item->target}}"><i class="fa-solid fa-arrow-right"></i> {{$item->getTranslatedAttribute('title')}}</a></h3></li>
                @endforeach
            </ul>
            @endif
            @endif
        </div>
    </div>
</div>
@endforeach