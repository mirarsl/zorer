@php empty($stack) ?  $stack = 0 :'' @endphp
<ul @if ($stack == 0) class="mainmenu" id="mobile-menu-active" @else class="submenu" @endif>
	@foreach ($items as $menu_item)
	<li class="{{ count($menu_item->children) > 0 ? 'has-droupdown' : '' }}">
		<a {!! $stack == 0 ? 'class="main"' : 'class="sub-menu-link"' !!} href='{{ !isset($menu_item->app_model) ? (isset($menu_item->route) ? $menu_item->link() : (isset($menu_item->parameters) ? $menu_item->parameters->{app()->getLocale()} : 'javascript:void(0);') ) : (isset($menu_item->parameters) ? route('page',$menu_item->parameters->{app()->getLocale()}) : 'javascript:void(0);') }}' target="{{$menu_item->target}}">{{ $menu_item->getTranslatedAttribute('title') }}</a>
		@if (count($menu_item->children) > 0 || isset($menu_item->app_model))
			@if (count($menu_item->children) > 0)
				@include('menus.header-mobile', ['items' => $menu_item->children, 'stack' => $stack + 1])
			@else
			<ul class="submenu">
				@php
				$model = app($menu_item->app_model);
				if(isset($menu_item->model_scopes) && is_string($menu_item->model_scopes)){
					foreach (json_decode($menu_item->model_scopes) as $key => $value) {
						$model = $model->$value();
					}
				}
				@endphp
				@foreach ($model->get() as $item)
				<li><a class="mobile-menu-link" href="{{route($menu_item->route,$item->getTranslatedAttribute('slug'))}}" target="{{$menu_item->target}}">{{$item->getTranslatedAttribute('title')}}</a></li>
				@endforeach
			</ul>
			@endif
		@endif
	</li>
	@endforeach
</ul> 