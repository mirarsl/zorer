<?php

namespace App\Providers;

use App\About;
use App\Contact;
use App\Popup;
use App\Project;
use App\Search;
use App\Service;
use App\Social;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(\App\FormFields\Repeater::class);
        Voyager::addFormField(\App\FormFields\LangMediaPicker::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Carbon::now('Europe/Istanbul');
        setlocale(LC_TIME, 'Turkish');
        $Contact = Contact::find(1);
        $Social = Social::find(1);
        $About = About::find(1);
        $Popup = Popup::find(1);
        $Search = Search::active()->orderBy('count','desc')->limit(10)->get();

        $sharedContent = [
            'Contact' => $Contact,
            'Social' => $Social,
            'About' => $About,
            'Popup' => $Popup,
            'Search' => $Search
        ];
        View::share("sharedContent",$sharedContent);
    }
}
