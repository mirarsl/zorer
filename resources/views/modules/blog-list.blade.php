@php
use App\Search;
$Terms = Search::active()->where('count','>',200)->where('table','blogs')->orderBy('count','desc')->limit(10)->get();
if(isset(request()->search)){
    if(!session()->has('utm_code') || session()->get('utm_code') != request()->utm_code.'-'.request()->search){
        if(Search::where('term',request()->search)->where('table','blogs')->exists()){
            $term = Search::active()->where('term',request()->search)->where('table','blogs')->first();
            $term->count++;
            $term->save();
        }else{
            $term = new Search();
            $term->table = 'blogs';
            $term->term = request()->search;
            $term->count = 1;
            $term->save();
        }
    }
    $blogs = $Page->data(12,request()->search);
    session()->put('utm_code',request()->utm_code.'-'.request()->search);
}else{
    $blogs = $Page->data(12);
}
@endphp
<div class="rts-blog-grid-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="row g-24">
                    @forelse ($blogs as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="blog-single-two-wrapper">
                            <div class="image-area">
                                <a href="{{route('blog',$item->getTranslatedAttribute('slug'))}}" class="thumbnail">
                                    <img src="{{Voyager::image($item->image)}}" alt="{{$item->getTranslatedAttribute('title')}}">
                                </a>
                                <div class="date-area">
                                    <div class="date">
                                        <span class="day">{{$item->created_at->translatedFormat('j')}}</span>
                                        <span class="month">{{$item->created_at->translatedFormat('F')}}</span>
                                    </div>
                                    <div class="year">
                                        <span class="year">{{$item->created_at->translatedFormat('Y')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inner">
                                <a href="{{route('blog',$item->getTranslatedAttribute('slug'))}}">
                                    <h2 class="h5 title">
                                        {{$item->getTranslatedAttribute('title')}}
                                    </h2>
                                    <p class="disc mb-3">
                                        {{$item->getTranslatedAttribute('spot')}}
                                    </p>
                                </a>
                                <a href="{{route('blog',$item->getTranslatedAttribute('slug'))}}" class="btn-read-more-blog">Devamını Oku <i class="fa-light fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <h2 class="h5 title">
                                {{__('blogs.no_blogs')}}
                            </h2>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-xl-4  pd-control-bg--40">
                <div class="rts-single-wized search">
                    <div class="wized-header">
                        <h2 class="h5 title">
                            {{__('blogs.search')}}
                        </h2>
                    </div>
                    <div class="wized-body">
                        <div class="rts-search-wrapper">
                            <form class="d-flex" action="{{route('page',$Page->getTranslatedAttribute('slug'))}}" method="get">
                                <input type="hidden" name="utm_code" value="{{csrf_token()}}">
                                <input type="text" name="search" placeholder="{{__('search_placeholder')}}" value="{{request()->search}}">
                                <button type="submit">{{__('search_button')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- rts single wized end -->
                <!-- rts single wized -->
                <div class="rts-single-wized Categories">
                    <div class="wized-header">
                        <h5 class="title">
                            Categories
                        </h5>
                    </div>
                    <div class="wized-body">
                        <!-- single categoris -->
                        <ul class="single-categories">
                            <li><a href="#">Business Solution <i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                        <!-- single categoris End -->
                        <!-- single categoris -->
                        <ul class="single-categories">
                            <li><a href="#">Solution Model<i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                        <!-- single categoris End -->
                        <!-- single categoris -->
                        <ul class="single-categories">
                            <li><a href="#">Business Advantage<i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                        <!-- single categoris End -->
                        <!-- single categoris -->
                        <ul class="single-categories">
                            <li><a href="#">Feature Product<i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                        <!-- single categoris End -->
                        <!-- single categoris -->
                        <ul class="single-categories">
                            <li><a href="#">Catagory Thury<i class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                        <!-- single categoris End -->
                    </div>
                </div>
                <!-- rts single wized end -->
                <!-- rts single wized -->
                <div class="rts-single-wized Recent-post">
                    <div class="wized-header">
                        <h5 class="title">
                            Recent Posts
                        </h5>
                    </div>
                    <div class="wized-body">
                        <!-- recent-post -->
                        <div class="recent-post-single">
                            <div class="thumbnail">
                                <a href="blog-details.html"><img src="assets/images/blog/sm/01.jpg" alt="Blog_post"></a>
                            </div>
                            <div class="content-area">
                                <div class="user">
                                    <i class="fal fa-clock"></i>
                                    <span>15 Jan, 2023</span>
                                </div>
                                <a class="post-title" href="blog-details.html">
                                    <h6 class="title">We would love to share a similar experience</h6>
                                </a>
                            </div>
                        </div>
                        <!-- recent-post End -->
                        <!-- recent-post -->
                        <div class="recent-post-single">
                            <div class="thumbnail">
                                <a href="blog-details.html"><img src="assets/images/blog/sm/02.jpg" alt="Blog_post"></a>
                            </div>
                            <div class="content-area">
                                <div class="user">
                                    <i class="fal fa-clock"></i>
                                    <span>15 Jan, 2023</span>
                                </div>
                                <a class="post-title" href="blog-details.html">
                                    <h6 class="title">We would love to share a similar experience</h6>
                                </a>
                            </div>
                        </div>
                        <!-- recent-post End -->
                        <!-- recent-post -->
                        <div class="recent-post-single">
                            <div class="thumbnail">
                                <a href="blog-details.html"><img src="assets/images/blog/sm/03.jpg" alt="Blog_post"></a>
                            </div>
                            <div class="content-area">
                                <div class="user">
                                    <i class="fal fa-clock"></i>
                                    <span>15 Jan, 2023</span>
                                </div>
                                <a class="post-title" href="blog-details.html">
                                    <h6 class="title">We would love to share a similar experience</h6>
                                </a>
                            </div>
                        </div>
                        <!-- recent-post End -->

                    </div>
                </div>
                <!-- rts single wized end -->
                <!-- rts single wized -->
                <div class="rts-single-wized Recent-post">
                    <div class="wized-header">
                        <h5 class="title">
                            Gallery Post
                        </h5>
                    </div>
                    <div class="wized-body">
                        <div class="gallery-inner">
                            <div class="row-1 single-row">
                                <a href="#"><img src="assets/images/blog/sm/04.jpg" alt="Gallery"></a>
                                <a href="#"><img src="assets/images/blog/sm/05.jpg" alt="Gallery"></a>
                                <a href="#"><img src="assets/images/blog/sm/06.jpg" alt="Gallery"></a>
                            </div>
                            <div class="row-2 single-row">
                                <a href="#"><img src="assets/images/blog/sm/07.jpg" alt="Gallery"></a>
                                <a href="#"><img src="assets/images/blog/sm/08.jpg" alt="Gallery"></a>
                                <a href="#"><img src="assets/images/blog/sm/09.jpg" alt="Gallery"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- rts single wized end -->
                <!-- rts single wized -->
                <div class="rts-single-wized">
                    <div class="wized-header">
                        <h5 class="title">
                            Popular Tags
                        </h5>
                    </div>
                    <div class="wized-body">
                        <div class="tags-wrapper">
                            <a href="#">Services</a>
                            <a href="#">Business</a>
                            <a href="#">Growth</a>
                            <a href="#">Finance</a>
                            <a href="#">UI/UX Design</a>
                            <a href="#">Solution</a>
                            <a href="#">Speed</a>
                            <a href="#">Strategy</a>
                            <a href="#">Technology</a>
                        </div>
                    </div>
                </div>
                <!-- rts single wized end -->
            </div>
        </div>
    </div>
</div>