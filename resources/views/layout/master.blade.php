<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">
<head>
    <base href="{{ url('/') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-control" content="public">
    <meta name="google-site-verification" content="XTkYTPF898JH3nBICCEolHRa8uF5uYaw9X-3fyZXEBc" />
    
    <link rel="canonical" href="{{ url()->full() }}" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    
    
    <link rel="icon" href="/assets/favicon.png" type="image/x-icon"/>
    
    <link rel="stylesheet" href="assets/css/plugins/fontawesome-5.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/metismenu.css">
    <link rel="stylesheet" href="assets/css/plugins/hover-revel.css">
    <link rel="stylesheet" href="assets/css/plugins/timepickers.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css?ver={{rand(1111,9999)}}">
    
    @stack('links')
    {!! setting('site.header_libs') !!}
    @stack('styles')
</head>
<body>
    <header class="heder-two header--sticky">
        <div class="header-two-container">
            <div class="row">
                <div class="col-12">
                    <div class="header-main-wrapper">
                        <div class="logo-area">
                            <a href="{{route('home')}}" class="logo">
                                <img src="/assets/logo.png" alt="{{setting('site.title')}}">
                            </a>
                        </div>
                        <div class="rts-header-right">
                            <div class="menu-area" id="menu-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                    <rect width="18" height="2" fill="#0C0A0A" />
                                    <rect y="7" width="18" height="2" fill="#0C0A0A" />
                                    <rect y="14" width="18" height="2" fill="#0C0A0A" />
                                </svg>
                            </div>
                            <div class="top">
                                <div class="start-top">
                                    <div class="icon"><i class="fa-sharp fa-solid fa-bolt"></i></div>
                                    <p>Yenilikçi, güvenilir, kaliteli</p>
                                </div>
                                <div class="end-top">
                                    <div class="single-info">
                                        <div class="icon"><i class="fa-thin fa-location-dot"></i> </div>
                                        <p>{{$sharedContent['Contact']->address1}}</p>
                                    </div>
                                    <div class="single-info">
                                        <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                                        <a href="mailto:{{$sharedContent['Contact']->email1}}">{{$sharedContent['Contact']->email1}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="main-nav-desk nav-area">
                                    <nav>
                                        {{ menu('Header', 'menus.header') }}
                                    </nav>
                                </div>
                                <div class="right-area">
                                    <div class="icon-area">
                                        <div class="search" id="search">
                                            <i class="fa-regular fa-magnifying-glass"></i>
                                        </div>
                                    </div>
                                    <a href="tel:{{$sharedContent['Contact']->phone1}}" class="rts-btn btn-seconday btn-transparent">İletişime Geç <i class="fa-solid fa-arrow-up-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <div class="inner-main-wrapper-desk">
            @if($sharedContent['About']->image)
            <div class="thumbnail">
                <img src="{{Voyager::image($sharedContent['About']->image)}}" alt="elevate">
            </div>
            @endif
            <div class="inner-content">
                @if(route('home') == url()->current())
                <h1 class="title">{{setting('site.title')}}</h1>
                @else
                <span class="h1 title">{{setting('site.title')}}</span>
                @endif
                <p class="disc">{{$sharedContent['About']->short_about}}</p>
                <div class="footer">
                    <div class="h4 title">Desteğe mi ihtiyacınız var?</div>
                    <a href="tel:{{$sharedContent['Contact']->phone1}}" class="rts-btn btn-seconday">İletişime Geç</a>
                </div>
            </div>
        </div>
        <div class="mobile-menu d-block d-xl-none">
            <nav class="nav-main mainmenu-nav mt--30">
                {{ menu('Header', 'menus.header-mobile') }}
            </nav>
            
            <div class="social-wrapper-one">
                <ul>
                    @if($sharedContent['Social']->instagram)
                    <li>
                        <a href="{{$sharedContent['Social']->instagram}}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    @endif
                    @if($sharedContent['Social']->facebook)
                    <li>
                        <a href="{{$sharedContent['Social']->facebook}}">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    @endif
                    @if($sharedContent['Social']->twitter)
                    <li>
                        <a href="{{$sharedContent['Social']->twitter}}">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                    @if($sharedContent['Social']->youtube)
                    <li>
                        <a href="{{$sharedContent['Social']->youtube}}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </li>
                    @endif
                    @if($sharedContent['Social']->linkedin)
                    <li>
                        <a href="{{$sharedContent['Social']->linkedin}}">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
    
    <div class="rts-footer-two rts-section-gap2Top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-footer-wrapper-two">
                        <div class="single-footer-wized-two logo-area" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                            <a href="{{route('home')}}" class="logo">
                                <img src="/assets/logo-white.png" alt="{{setting('site.title')}}">
                            </a>
                            <p class="disc-f">{{ $sharedContent['About']->short_about }}</p>
                            <div class="rts-social-wrapper-three">
                                <ul>
                                    @if ($sharedContent['Social']->instagram)
                                    <li><a href="{{$sharedContent['Social']->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                                    @endif
                                    @if ($sharedContent['Social']->facebook)
                                    <li><a href="{{$sharedContent['Social']->facebook}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    @endif
                                    @if ($sharedContent['Social']->twitter)
                                    <li><a href="{{$sharedContent['Social']->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                                    @endif
                                    @if ($sharedContent['Social']->youtube)
                                    <li><a href="{{$sharedContent['Social']->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>
                                    @endif
                                    @if ($sharedContent['Social']->linkedin)
                                    <li><a href="{{$sharedContent['Social']->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        {{ menu('Footer', 'menus.footer') }}
                        <div class="single-footer-wized-two user-number" data-sal="slide-up" data-sal-delay="350" data-sal-duration="800">
                            <div class="user-number-wrapper mt--10">
                                <div class="single-number">
                                    <h2 class="title">Telefon Numaramız</h2>
                                    @if($sharedContent['Contact']->phone1)
                                    <div class="number mb-1">
                                        <i class="fa-solid fa-phone"></i>
                                        <a href="tel:{{$sharedContent['Contact']->phone1}}">{{$sharedContent['Contact']->phone1}}</a>
                                    </div>
                                    @endif
                                    @if($sharedContent['Contact']->phone2)
                                    <div class="number mb-1">
                                        <i class="fa-solid fa-phone"></i>
                                        <a href="tel:{{$sharedContent['Contact']->phone2}}">{{$sharedContent['Contact']->phone2}}</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="single-number">
                                    <h2 class="title">E-Posta Adresimiz</h2>
                                    @if($sharedContent['Contact']->email1)
                                    <div class="number mb-1">
                                        <i class="fa-light fa-envelope"></i>
                                        <a href="mailto:{{$sharedContent['Contact']->email1}}">{{$sharedContent['Contact']->email1}}</a>
                                    </div>
                                    @endif
                                    @if($sharedContent['Contact']->email2)
                                    <div class="number mb-1">
                                        <i class="fa-light fa-envelope"></i>
                                        <a href="mailto:{{$sharedContent['Contact']->email2}}">{{$sharedContent['Contact']->email2}}</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="single-number">
                                    <h2 class="title">{{$sharedContent['Contact']->contact1}}</h2>
                                    <div class="number">
                                        <i class="fa-light fa-location-dot"></i>
                                        <a class="mt-dec" href="https://maps.app.goo.gl/{{$sharedContent['Contact']->address1}}">{{$sharedContent['Contact']->address1}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ menu('Footer Alt Bar', 'menus.footer-alt') }}
        
        
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright-footer-two text-start">
                            <p class="disc">
                                © {{date('Y')}} {{setting('site.title')}}. Tüm hakları saklıdır.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright-footer-two text-end">
                            <p class="disc">
                                Made with <i style="color: var(--color-primary);" class="fa fa-heart"></i> by <a target="_blank" style="color: #f2693e" href="https://bario.com.tr">Bario.</a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="whatsapp-icon">
        <a href="https://wa.me/{{str_replace(array(' ', '-', '(', ')', '+'), '', $sharedContent['Contact']->phone1)}}" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>
    
    
    <div class="search-input-area">
        <div class="container">
            <form class="w-100" action="{{route('search')}}" method="get">
                <div class="search-input-inner">
                    <div class="input-div">
                        @csrf
                        <input class="search-input" type="text" placeholder="{{__('search_placeholder')}}" name="term">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="search-results">
                <ul class="list-unstyled d-flex flex-wrap gap-2 justify-content-center">
                    @foreach($sharedContent['Search'] as $search)
                    <li><a href="{{route('search',['term'=>$search->term,'_token'=>csrf_token()])}}">{{$search->term}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    
    
    <div id="anywhere-home" class=""></div>
    
    <div id="elevate-load">
        <div class="loader-wrapper">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    
    @stack('modals')
    
    
    <script src="assets/js/plugins/jquery.min.js"></script>
    <script src="assets/js/vendor/jqueryui.js"></script>
    <script src="assets/js/plugins/counter-up.js"></script>
    <script src="assets/js/plugins/swiper.js"></script>
    <script src="assets/js/vendor/twinmax.js"></script>
    <script src="assets/js/vendor/split-text.js"></script>
    <script src="assets/js/plugins/text-plugins.js"></script>
    <script src="assets/js/plugins/metismenu.js"></script>
    <script src="assets/js/vendor/waypoint.js"></script>
    <script src="assets/js/vendor/waw.js"></script>
    <script src="assets/js/vendor/magnific-popup.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/jquery-timepicker.js"></script>
    <script src="assets/js/vendor/sal.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/jquery-slideNav.js"></script>
    <script src="assets/js/plugins/hover-revel.js"></script>
    <script src="assets/js/plugins/contact-form.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/plugins/swip-img.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>
    <script>
        lazyload();
    </script>
    @if (session()->has('dialog'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "{{ session('status') == 'success' ? __('success') : __('error') }}",
            text: "{{ session('message') }}",
            icon: "{{ session('status') }}",
            confirmButtonText: "@lang('confirm')",
        });
    </script>
    @endif
    @stack('scripts')
    @stack('page_codes')
</body>
</html>