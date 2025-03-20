<div class="menu-row-wrapper mt--80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="menu-wrapper-footer-row justify-content-center">
                    @foreach($items as $menu_item)
                    <div class="single-menu" data-sal="zoom-in" data-sal-delay="150" data-sal-duration="800">
                        <a href="{{ $menu_item->link() }}">{{$menu_item->title}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
