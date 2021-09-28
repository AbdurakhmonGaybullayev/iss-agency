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
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('home');

    Route::get('/faq',function (){
        return view('front.about.FAQ.index',[
            'faqs'=>\App\Models\QandA::orderBy('created_at', 'desc')->paginate(9),
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('faq');

    Route::get('/cooperation',function (){
        return view('front.about.Cooperation.index',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('cooperation');

    Route::get('/gallery',function (){
        return view('front.gallery.index',[
            'gallery'=>\App\Models\Gallery::orderBy('created_at', 'desc')->get(),
            'contact'=>\App\Models\Contact::first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery');

    Route::get('/gallery/{id}',function ($lang,$id){
        return view('front.gallery.details',[
            'album'=>\App\Models\Gallery::where('id',$id)->first(),
            'contact'=>\App\Models\Contact::first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery-detail');

    Route::get('/news',function (){
        return view('front.news.index',[
            'contact'=>\App\Models\Contact::first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news');

    Route::get('/news/{id}',function ($lang,$id){
        return view('front.news.details',[
            'contact'=>\App\Models\Contact::first(),
            'details'=>\App\Models\News::where('id',$id)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get()->take(3),
            'countries
            '=>\App\Models\News::orderBy('created_at', 'desc')->get()->take(3),
            'programs'=>\App\Models\Programm::take(5)->get(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news-details');


});
