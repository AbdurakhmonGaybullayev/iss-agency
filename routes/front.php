<?php

use Illuminate\Support\Facades\Route;



Route::prefix('/{lang}')->group(function () {

    Route::get('/', function () {
        return view('front.home.index',[
            'main_header'=>\App\Models\MainHeader::first(),
            'contact'=>\App\Models\Contact::first(),
            'universities'=>\App\Models\University::where('top',1)->orderBy('number', 'asc')->take(9)->get(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('home');

    Route::get('/faq',function (){
        return view('front.about.FAQ.index',[
            'faqs'=>\App\Models\QandA::orderBy('created_at', 'desc')->paginate(9),
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('faq');

    Route::get('/cooperation',function (){
        return view('front.about.Cooperation.index',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('cooperation');

    Route::get('/gallery',function (){
        return view('front.gallery.index',[
            'gallery'=>\App\Models\Gallery::orderBy('created_at', 'desc')->get(),
            'contact'=>\App\Models\Contact::first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery');

    Route::get('/gallery/{id}',function ($lang,$id){
        return view('front.gallery.details',[
            'album'=>\App\Models\Gallery::where('id',$id)->first(),
            'contact'=>\App\Models\Contact::first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery-detail');

    Route::get('/news',function (){
        return view('front.news.index',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news');

    Route::get('/news/{id}',function ($lang,$id){
        return view('front.news.details',[
            'contact'=>\App\Models\Contact::first(),
            'details'=>\App\Models\News::where('id',$id)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get()->take(3),
            'countries'=>\App\Models\Country::join('universities','countries.id','=','universities.country_id')->select('countries.id','countries.name_uz','countries.name_ru','countries.name_en')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'all-programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news-details');

    Route::get('/programs',function (){
        return view('front.programs.index',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'universities'=>\App\Models\University::orderBy('top', 'desc')->orderBy('number', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('programs');

    Route::get('/programs/{id}',function ($lang,$id){
        return view('front.programs.details',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'university'=>\App\Models\University::where('id',$id)->first(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('program-details');


});
