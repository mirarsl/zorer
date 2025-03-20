<?php

use Illuminate\Support\Facades\Route;

Route::get('/blog/blog/pandemi-ile-yasam', function(){
    return redirect()->to('/blog/pandemi-i-le-yasam',301);
});

Route::get('/blog/iletisim', function(){
    return redirect()->to('/iletisim',301);
});

Route::get('/blog/covid19', function(){
    return redirect()->to('/covid19',301);
});

Route::get('/blog/?v=1', function(){
    return redirect()->to('/blog',301);
});

Route::get('/blog/blog/is-ekipmanlarinin-periyodik-kontrolu', function(){
    return redirect()->to('/blog/is-ekipmanlarinin-periyodik-kontrolleri',301);
});

Route::get('/blog/blog/stres-yonetiminde-beslenmenin-gucu', function(){
    return redirect()->to('/blog/stres-yonetiminde-beslenmenin-gucu',301);
});

Route::get('/blog/periyodik-test-ve-kontroller', function(){
    return redirect()->to('/blog/hangi-is-ekipmanlari-periyodik-kontrole-tabi',301);
});

Route::get('/blog/blog/kis-hastaliklarindan-korunma-onerileri', function(){
    return redirect()->to('/blog/kis-hastaliklarindan-korunma-onerileri',301);
});

Route::get('/blog/isyeri-hekimi', function(){
    return redirect()->to('/hizmet/isyeri-hekimi',301);
});

Route::get('/blog/hakkimizda', function(){
    return redirect()->to('/hakkimizda',301);
});

Route::get('/blog/isyeri-ortam-olcumleri', function(){
    return redirect()->to('/hizmet/isyeri-ortam-olcumleri',301);
});

Route::get('/blog/ilkyardim-egitimi', function(){
    return redirect()->to('/hizmet/ilkyardim-egitimi',301);
});

Route::get('/blog/blog/pandemi-doneminde-uzaktan-calismalarda-ergonomik-korunma-yollari', function(){
    return redirect()->to('/blog/uzaktan-calismalarda-ergonomik-korunma-yollari',301);
});

Route::get('/blog/blog/', function(){
    return redirect()->to('/blog',301);
});