<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::prefix('/{lang}')->group(function () {

    Route::get('/', function () {

        if (\Illuminate\Support\Facades\Auth::user()){
            $user = \Illuminate\Support\Facades\Auth::user();
            $contact = \App\Models\Contact::where('branch_id',$user->branch_id)->first();
        }else{
            $contact = \App\Models\Contact::where('type',1)->first();
        }

        return view('front.home.index',[
            'main_header'=>\App\Models\MainHeader::first(),
            'home_direction_sections_1'=>\App\Models\HomeDirectionSection::whereBetween('number', [1, 3])->orderBy('number', 'asc')->get(),
            'home_direction_sections_2'=>\App\Models\HomeDirectionSection::whereBetween('number', [4, 6])->orderBy('number', 'asc')->get(),
            'contact'=>$contact,
            'universities'=>\App\Models\University::where('top',1)->orderBy('number', 'desc')->orderBy('created_at', 'desc')->take(9)->get(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'about_us'=>\App\Models\AboutUs::first(),
            'master'=>\Illuminate\Support\Facades\DB::table('direction_university')->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('programms','direction_programm.direction_id','=','programms.id')->where('programms.name_uz','Magistratura')->select('direction_university.*')->get()->unique()->count(),
            'bachelor'=>\Illuminate\Support\Facades\DB::table('direction_university')->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('programms','direction_programm.direction_id','=','programms.id')->where('programms.name_uz','Bakalavriat')->select('direction_university.*')->get()->unique()->count(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('home');

    Route::get('/faq',function (){
        return view('front.about.FAQ.index',[
            'faqs'=>\App\Models\QandA::orderBy('created_at', 'desc')->paginate(9),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'countries'=>\App\Models\Country::join('universities','universities.country_id','countries.id')->select('countries.*')->get()->unique(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.*')->take(5)->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('faq');

    Route::get('/cooperation',function (){
        return view('front.about.Cooperation.index',[
            'cooperation_text'=>\App\Models\CooperationOfferText::first(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('cooperation');

    Route::get('/gallery',function (){

        $items_per_page = 1;

        $gallery = \App\Models\Gallery::orderBy('created_at', 'desc')->paginate($items_per_page);

        if (isset($request->page)){
            if ($request->page > ceil($gallery->total()/$items_per_page)){
                return Redirect::back();
            }
        }

        return view('front.gallery.index',[
            'gallery'=>$gallery,
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery');

    Route::get('/gallery/{id}',function ($lang,$id){
        return view('front.gallery.details',[
            'album'=>\App\Models\Gallery::where('id',$id)->first(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'testimonials'=>\App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('gallery-detail');

    Route::get('/news',function (\Illuminate\Http\Request $request){

        $items_per_page = 6;

        $news = \App\Models\News::orderBy('created_at', 'desc')->paginate($items_per_page);

        if (isset($request->page)){
            if ($request->page > ceil($news->total()/$items_per_page)){
                return Redirect::back();
            }
        }
        return view('front.news.index',[
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>$news,
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news');

    Route::get('/news/{id}',function ($lang,$id){
        $details = \App\Models\News::where('id',$id)->first();
        return view('front.news.details',[
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'details'=>$details,
            'news'=>\App\Models\News::where('id','!=',$id)->orderBy('created_at', 'desc')->get()->take(3),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'all-programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('news-details');

    Route::get('/programs',[\App\Http\Controllers\Front\FrontController::class,'programs'])->name('programs');

    Route::get('/programs/{id}',function ($lang,$id){
        $university = \App\Models\University::where('id',$id)->first();
        $directions = [];
        foreach($university->directions as $key => $direction){
                                $directions[] = $direction->id;
        }
        $universityPrograms = \Illuminate\Support\Facades\DB::table('direction_programm')->where('direction_id',$directions)->select('programm_id')->get();
        $array = [];

        foreach ($universityPrograms as $universityProgram){
            $array[] = $universityProgram->programm_id;
        }
        $universityPrograms = \App\Models\Programm::whereIn('id',$array)->get();
        $universityDirections = \App\Models\Direction::join('direction_university','direction_university.direction_id','directions.id')->where('direction_university.university_id',$id)->join('direction_programm','direction_programm.direction_id','directions.id')->orderBy('direction_programm.programm_id','asc')->select('directions.*','direction_programm.programm_id')->get()->unique();

        return view('front.programs.details',[
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->take(3)->get(),
            'university'=>$university,
            'universityPrograms'=>$universityPrograms,
            'universityDirections'=>$universityDirections,
            'universities'=>\App\Models\University::where('country_id',$university->country_id)->where('id','!=',$id)->orderBy('number', 'desc')->take(3)->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'countries'=>\App\Models\Country::join('universities','countries.id','=','universities.country_id')->select('countries.id','countries.name_uz','countries.name_ru','countries.name_en')->orderBy('name_en', 'desc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('program-details');

    Route::get('/branch',function (){

        $branches = \App\Models\Branch::join('contacts','contacts.branch_id','branches.id')->where('contacts.type',0)->select('branches.*','contacts.phone_number')->orderBy('branches.number', 'desc')->get()->unique();

        if ($branches->count() == 0){
            return \Illuminate\Support\Facades\Redirect::back();
        }

        return view('front.about.Branches.index',[
            'contact'=>\App\Models\Contact::first(),
            'branches'=>$branches,
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('branch');

    Route::get('/about',function (){
        return view('front.about.index',[
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'staffs'=>\App\Models\Team::orderBy('number','desc')->get(),
            'about_us'=>\App\Models\AboutUs::first(),
            'master'=>\Illuminate\Support\Facades\DB::table('direction_university')->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('programms','direction_programm.direction_id','=','programms.id')->where('programms.name_uz','Magistratura')->select('direction_university.*')->get()->unique()->count(),
            'bachelor'=>\Illuminate\Support\Facades\DB::table('direction_university')->join('direction_programm','direction_university.direction_id','=','direction_programm.direction_id')->join('programms','direction_programm.direction_id','=','programms.id')->where('programms.name_uz','Bakalavriat')->select('direction_university.*')->get()->unique()->count(),
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        ]);
    })->name('about');

    Route::get('sign-up',function (){
       return view('front.registration.sign-up.index',[
           'locale'=>\Illuminate\Support\Facades\App::getLocale(),
           'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
           'contact'=>\App\Models\Contact::where('type',1)->first(),
           'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
           'branches'=>\App\Models\Branch::orderBy('name_uz', 'desc')->get(),
           'foradmission'=>null,
       ]);
    })->name('sign-up');

    Route::get('sign-up/{foradmission}',function ($lang,$foradmission = null){

        $university = \App\Models\University::where('id',$foradmission)->select('id')->first();

        if ($university == null){
            return abort('404');
        }

        return view('front.registration.sign-up.index',[
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'Branches'=>\App\Models\Branch::orderBy('name_uz', 'desc')->get(),
            'foradmission'=>$foradmission,
        ]);
    })->name('sign-up-for-admission');

    Route::post('sign-up',[\App\Http\Controllers\Front\RegistrationController::class,'sign_up'])->name('sign-up');

    Route::get('sign-in',function (){
        return view('front.registration.sign-in.index',[
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'foradmission'=>null,
        ]);
    })->name('sign-in');

    Route::get('sign-in/{foradmission}',function ($lang, $foradmission = null){

        $university = \App\Models\University::where('id',$foradmission)->select('id')->first();

        if ($university == null){
            return abort('404');
        }

        return view('front.registration.sign-in.index',[
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'foradmission'=>$foradmission,
        ]);
    })->name('sign-in-for-admission');

    Route::get('/logout', [\App\Http\Controllers\Front\RegistrationController::class,'logout'])->name('user-logout');

    Route::post('/sign-in', [\App\Http\Controllers\Front\RegistrationController::class,'sign_in'])->name('sign-in');

    Route::post('/cooperation', [\App\Http\Controllers\Front\FrontController::class,'cooperation'])->name('cooperation');

    Route::get('/contact', function (){

        if (\Illuminate\Support\Facades\Auth::user()){
            $user = \Illuminate\Support\Facades\Auth::user();
            $contact = \App\Models\Contact::where('branch_id',$user->branch_id)->first();
        }else{
            $contact = \App\Models\Contact::where('type',1)->first();
        }

        return view('front.about.Contact.index',
    [
        'locale'=>\Illuminate\Support\Facades\App::getLocale(),
        'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
        'contact'=>$contact,
        'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
    ]
    );})->name('contact');

    Route::post('/message', [\App\Http\Controllers\Front\FrontController::class,'message'])->name('message');

    Route::get('admission/{id}',function ($lang,$id){

        if (!\Illuminate\Support\Facades\Auth::user()){
            return redirect()->route('choose',['lang'=>$lang,'id'=>$id]);
        }

        $university = \App\Models\University::where('id',$id)->first();
        $directions = [];
        foreach($university->directions as $key => $direction){
            $directions[] = $direction->id;
        }
        $universityPrograms = \Illuminate\Support\Facades\DB::table('direction_programm')->where('direction_id',$directions)->select('programm_id')->get();
        $array = [];

        foreach ($universityPrograms as $universityProgram){
            $array[] = $universityProgram->programm_id;
        }
        $universityPrograms = \App\Models\Programm::whereIn('id',$array)->get();

        return view('front.documents.index',[
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'Branches'=>\App\Models\Branch::orderBy('name_uz', 'desc')->get(),
            'university'=>$university,
            'universityPrograms'=>$universityPrograms,
        ]);
    })->name('admission');

    Route::get('choose/{id}',function ($lang,$id){
        return view('front.documents.registration.choose.index',[
            'locale'=>\Illuminate\Support\Facades\App::getLocale(),
            'programs'=>\App\Models\Programm::join('direction_programm','programms.id','=','direction_programm.programm_id')->select('programms.id','programms.name_uz','programms.name_ru','programms.name_en')->orderBy('programms.id','asc')->get()->unique(),
            'contact'=>\App\Models\Contact::where('type',1)->first(),
            'news'=>\App\Models\News::orderBy('created_at', 'desc')->get(),
            'Branches'=>\App\Models\Branch::orderBy('name_uz', 'desc')->get(),
            'id'=>$id
        ]);
    })->name('choose');

    Route::post('admission',[\App\Http\Controllers\Front\FrontController::class,'document'])->name('admission-send');

    Route::get('admission',[\App\Http\Controllers\Front\FrontController::class,'search'])->name('search');

    Route::get('/search',[\App\Http\Controllers\Front\FrontController::class,'search'])->name('search');

});
