<?php

namespace App\Http\Controllers;

use App\Page;
use App\Service;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $Page = Page::where('id',1)->first();
        if(empty($Page)) abort(404);

        SEOTools::setTitle($Page->getTranslatedAttribute('meta_title') ?? $Page->getTranslatedAttribute('title'));
        SEOTools::setDescription($Page->getTranslatedAttribute('meta_desc'));
        SEOTools::setCanonical(url()->full());
        SEOMeta::addKeyword(explode(',',$Page->getTranslatedAttribute('meta_tags')));
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::opengraph()->addImage(url(asset(setting('site.logo'))));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('locale', 'tr');
        SEOTools::jsonLd()->addImage(url(asset(setting('site.logo'))));

        SEOTools::jsonLd()->addValue('keywords', $Page->getTranslatedAttribute('meta_tags'));

        Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
            $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
        });

        return view("pages.home",compact('Page'));
    }
}