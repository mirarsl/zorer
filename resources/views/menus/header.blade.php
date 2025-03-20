@php
empty($stack) ?  $stack = 0 :''
@endphp
<ul {!! $stack > 0 ? 'class="submenu '.($stack == 1 ? 'inner-page' : 'third-lvl base').'"' : '' !!}>
	@foreach ($items as $menu_item)
	<li {!! count($menu_item->children) > 0 || isset($menu_item->app_model) ? ($stack > 0 ? 'class="sub-dropdown"' : 'class="has-droupdown pages"') : '' !!}>
		<a {!! $stack == 0 ? 'class="nav-link"' : 'class="sub-menu-link"' !!} href='{{ !isset($menu_item->app_model) ? (isset($menu_item->route) ? $menu_item->link() : (isset($menu_item->parameters) ? $menu_item->parameters->{app()->getLocale()} : 'javascript:void(0);') ) : (isset($menu_item->parameters) ? route('page',$menu_item->parameters->{app()->getLocale()}) : 'javascript:void(0);') }}' target="{{$menu_item->target}}">{{ $menu_item->getTranslatedAttribute('title') }}</a>
		@if (count($menu_item->children) > 0 || isset($menu_item->app_model))
		@if (count($menu_item->children) > 0)
		@include('menus.header', ['items' => $menu_item->children, 'stack' => $stack + 1])
		@else
		<ul class="submenu {{ $stack == 0 ? 'inner-page' : 'third-lvl base' }}">
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
			<li><a class="sub-menu-link" href="{{route($menu_item->route,$item->getTranslatedAttribute('slug'))}}" target="{{$menu_item->target}}">{{$item->getTranslatedAttribute('title')}}</a></li>
			@endforeach
		</ul>
		@endif
		@endif
	</li>
	@endforeach
</ul>