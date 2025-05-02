<?php

namespace App\Exceptions;

use App\Page;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            $Page = Page::where('slug','hata-sayfalari')->first();
            if($Page){
                SEOTools::setTitle('404');
                SEOTools::setDescription('Sayfa bulunamadı');
                SEOMeta::addKeyword(explode(',', $Page->getTranslatedAttribute('meta_tags')));
                SEOTools::setCanonical(url()->full());
                SEOTools::opengraph()->setTitle(SEOTools::getTitle());
                SEOTools::opengraph()->setUrl(url()->full());
                if($Page->image != null){
                    SEOTools::opengraph()->addImage(url(asset('/storage/'.$Page->image)));
                }
                SEOTools::opengraph()->addProperty('type', 'website');
                SEOTools::opengraph()->addProperty('locale', 'tr');
                SEOTools::twitter()->setTitle(SEOTools::getTitle());
                SEOTools::jsonLd()->setTitle(SEOTools::getTitle());
                if($Page->image != null){
                    SEOTools::jsonLd()->addImage(url(asset('/storage/'.$Page->image)));
                }
                SEOTools::jsonLd()->setType('WebPage');
                SEOTools::jsonLd()->setDescription('Aradığınız sayfa mevcut değil.');
                SEOTools::jsonLd()->addValue('name', 'Sayfa Bulunamadı');
                SEOTools::jsonLd()->addValue('isPartOf', [
                    '@type' => 'WebSite',
                    '@id' => url('/'),
                    'name' => setting('site.title')
                ]);
                SEOTools::jsonLd()->addValue('potentialAction', [
                    '@type' => 'SearchAction',
                    'target' => url('/arama?q={term}'),
                    'query-input' => 'required name=term'
                ]);
                
                Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($Page) {
                    $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
                    $trail->push($Page->getTranslatedAttribute('title'), url()->full());
                });
            }else{
                $Page = Page::first();

                Breadcrumbs::for('page', function (BreadcrumbTrail $trail) use ($e) {
                    $trail->push(__('pages.home'), '/'.(app()->getLocale() == 'tr' ? '' : app()->getLocale()));
                    $trail->push($e->getMessage(), url()->full());
                });
            }

            return response()->view('errors.404', ['Page' => $Page], 404);
        });
    }
}
