<?php

namespace App\Http\Controllers;

use App\Accreditation;
use App\Blog;
use App\Client;
use App\ClientCategory;
use App\CoverageCity;
use App\Message;
use App\News;
use App\Page;
use App\Plan;
use App\Poster;
use App\Presentation;
use App\Project;
use App\ProjectBlockApartment;
use App\Service;
use App\ServiceCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class PageController extends Controller
{
    function index(Request $request)
    {
        $segments = explode('/',$request->slug);
        foreach ($segments as $key => $value) {
            if($key == 0){
                $Page = Page::whereTranslation('slug','=', $value, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->where('top_page',null)->first();
            }else{
                $Page = $Page->pages()->whereTranslation('slug','=', $value, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->first();
            }
            if (empty($Page)) abort(404);
        }
        // return $Page;
        if (empty($Page)) abort(404);
        
        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') != '' ? $Page->getTranslatedAttribute('meta_title') : $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOTools::setCanonical(url()->full());
        SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
        SEOTools::opengraph()->setTitle(SEOTools::getTitle());
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::opengraph()->addImage(url(asset($Page->image)));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::twitter()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->addImage(url(asset($Page->image)));
        
        SEOTools::jsonLd()->addValue('keywords', $Page->getTranslatedAttribute('meta_tags'));
        
        Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
            if($Page->top_page != null){
                foreach($Page->allPages() as $page){
                    $trail->push($page->getTranslatedAttribute('title'), route('page', $page->fullSlug()));
                }
            }
            $trail->push($Page->getTranslatedAttribute('title'), route('page', $Page->fullSlug()));
        });
        
        return view("pages.template", compact("Page"));
    }
    
    function product_group(Request $request)
    {
        $Page = ServiceCategory::whereTranslation('slug','=', $request->slug, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->first();
        if (empty($Page)) abort(404);
        $Meta = Page::where('slug', 'urun-gruplari')->first();
        $Route = 'product_group';
        
        
        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') != '' ? $Page->getTranslatedAttribute('meta_title') : $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
        SEOTools::setCanonical(url()->full());
        SEOTools::opengraph()->setTitle(SEOTools::getTitle());
        SEOTools::opengraph()->setUrl(url()->full());
        if($Page->image != null){
            SEOTools::opengraph()->addImage(url(asset($Page->image)));
        }
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::twitter()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
        if($Page->image != null){
            SEOTools::jsonLd()->addImage(url(asset($Page->image)));
        }
        
        Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
            $trail->push(__('pages.product_group'), route('page', __('links.product_group')));
            $trail->push($Page->getTranslatedAttribute('title'), route('product_group', $Page->getTranslatedAttribute('slug')));
        });
        return view('details.product-category-details',compact('Page','Meta','Route'));
    }
    
    function product(Request $request)
    {
        $Page = Service::whereTranslation('slug','=', $request->slug, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->first();
        if (empty($Page)) abort(404);
        $Meta = Page::where('slug', 'urunler')->first();
        $Other = Service::active()->order()->limit(3)->get();
        $Route = 'product';
        
        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') != '' ? $Page->getTranslatedAttribute('meta_title') : $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
        SEOTools::setCanonical(url()->full());
        SEOTools::opengraph()->setTitle(SEOTools::getTitle());
        SEOTools::opengraph()->setUrl(url()->full());
        if($Page->image != null){
            SEOTools::opengraph()->addImage(url(asset($Page->image)));
        }
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::twitter()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
        if($Page->image != null){
            SEOTools::jsonLd()->addImage(url(asset($Page->image)));
        }
        Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
            $trail->push(__('pages.products'), route('page', __('links.products')));
            $trail->push($Page->getTranslatedAttribute('title'), route('product', $Page->getTranslatedAttribute('slug')));
        });
        
        return view('details.product-details',compact('Page','Meta','Route','Other'));
    }
    
    
    function tariffes(Request $request){
        $Meta = Page::where('slug', 'tarifler')->first();
        
        $Page = Plan::whereTranslation('slug','=',$request->slug, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->first();
        if (empty($Page)) abort(404);
        $Route = 'tariffe';
        
        
        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') != '' ? $Page->getTranslatedAttribute('meta_title') : $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
        SEOTools::setCanonical(url()->full());
        SEOTools::opengraph()->setTitle(SEOTools::getTitle());
        SEOTools::opengraph()->setUrl(url()->full());
        if($Page->image != null){
            SEOTools::opengraph()->addImage(url(asset($Page->image)));
        }
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::twitter()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
        if($Page->image != null){
            SEOTools::jsonLd()->addImage(url(asset($Page->image)));
        }
        
        Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
            $trail->push(__('pages.tariffs'), route('page', __('links.tariffs')));
            $trail->push($Page->getTranslatedAttribute('title'), route('tariffe', $Page->getTranslatedAttribute('slug')));
        });
        
        return view('details.tariffe-details',compact('Page','Meta', 'Route'));
    }
    
    function news(Request $request){
        $Meta = Page::where('slug', 'haberler')->first();
        
        $Page = News::whereTranslation('slug','=',$request->slug, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->first();
        $Other = News::whereTranslation('slug','!=',$request->slug, [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)->order()->limit(3)->get();
        if (empty($Page)) abort(404);
        $Route = 'news';
        
        
        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') != '' ? $Page->getTranslatedAttribute('meta_title') : $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
        SEOTools::setCanonical(url()->full());
        SEOTools::opengraph()->setTitle(SEOTools::getTitle());
        SEOTools::opengraph()->setUrl(url()->full());
        if($Page->image != null){
            SEOTools::opengraph()->addImage(url(asset($Page->image)));
        }
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::twitter()->setTitle(SEOTools::getTitle());
        SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
        if($Page->image != null){
            SEOTools::jsonLd()->addImage(url(asset($Page->image)));
        }
        
        Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
            $trail->push(__('pages.news'), route('page', __('links.news')));
            $trail->push($Page->getTranslatedAttribute('title'), route('news', $Page->getTranslatedAttribute('slug')));
        });
        
        return view('details.news-details',compact('Page','Meta', 'Route','Other'));
    }
    
    
    function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "type" => "required",
                "json.*" => "required",
                "g-recaptcha-response" => 'required',
            ],
            [
                "json.*.required" => __('input.required'),
            ]
        );

        if ($validator->fails()) {
            return redirect()->to(url()->previous())->with('dialog', '1')->with('status', 'error')->with('message', 'Formda eksik bilgi bulunmaktadır')->withErrors($validator)->withInput(request()->all());
        }

        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'), 'hr');
        if($score < 0.5){
            return redirect()->to(url()->previous())->with('dialog', '1')->with('status', 'error')->with('message', 'Lütfen robot olmadığınızı doğrulayın');
        }
        
        $validated = $validator->validate();
        
        if ($request->hasFile('json.file')) {
            $file = $request->file('json.file');
            $fileLocation = Storage::disk('public')->put('upload/', $file);
            $validated['json']['file'] = $fileLocation;
        }
        
        $Store = new Message();
        $Store->type = $validated['type'];
        $Store->json = json_encode($validated['json']);
        
        
        
        
        if ($Store->save()) {
            if (setting('site.mail') !== null && env('MAIL_USERNAME') !== null) {
                // SMTP Ayarları
                Mail::send('mail.default', $validated, function ($msg) use ($validated) {
                    $msg->from(env('MAIL_USERNAME'), setting('site.title'));
                    $msg->to(setting('site.mail'), setting('site.title'));
                    $msg->subject($validated['type']);
                });
            }
            
            
            return redirect()->to(url()->previous())->with('dialog', '1')->with('status', 'success')->with('message', 'Mesajınız başarıyla gönderildi');
        } else {
            return redirect()->to(url()->previous())->with('dialog', '1')->with('status', 'error')->with('message', 'Mesaj gönderimi sırasında bir hata oluştu');
        }
        
    }
    
    function sitemap()
    {
        $compact = Cache::remember('sitemap', 60*60*24, function () {
            $Page = Page::orderBy('id','asc')->get()->except(1);
            $ServiceCategory = ServiceCategory::orderBy('id','asc')->get();
            $Service = Service::orderBy('id','asc')->get();
            $Tariffes = Plan::orderBy('id','asc')->get();
            $News = News::orderBy('id','asc')->get();
            return compact('Page','ServiceCategory','Service','Tariffes','News');
        });
        
        $content = view('sitemap.index', $compact);
        return response($content)->header('Content-Type', 'application/xml');
    }
}
