<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Cooperation;
use App\Models\Document;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Telegram\Bot\Laravel\Facades\Telegram;

class FrontController extends Controller
{

    public function programs(Request $request)
    {

        $items_per_page = 6;

        if (count($request->all()) != 0) {
            if ($request->country || $request->program || $request->direction || $request->ielts || $request->price_from || $request->rank_from || $request->price_to || $request->rank_to) {

                $universities = University::where('universities.name_en', 'like', '%%');

                if ($request->direction && $request->direction != '') {
                    $universities = $universities->join('direction_university', 'direction_university.university_id', 'universities.id');
                }

                if ($request->direction && $request->direction != '' && $request->program && $request->program != '') {
                    $universities = $universities->join('direction_programm', 'direction_programm.direction_id', 'direction_university.direction_id');
                }

                if ($request->country && $request->country != '') {
                    $universities = $universities->where('universities.country_id', $request->country);
                }

                if ($request->ielts && $request->ielts != '' && $request->ielts != '4.5') {
                    if ($request->ielts == '9.5') {
                        $request->ielts = 0;
                    }
                    $universities = $universities->where('universities.ielts', $request->ielts);
                }

                if ($request->price_from) {
                    if ($request->price_from == '') {
                        $request->price_from = 0;
                    }
                    $universities = $universities->where('universities.price', '>=', $request['price_from']);
                }

                if ($request->price_to && $request->price_to != '') {
                    $universities = $universities->where('universities.price', '<=', $request['price_to']);
                }

                if ($request->rank_from) {
                    if ($request->rank_from == '') {
                        $request->rank_from = 0;
                    }
                    $universities = $universities->where('universities.rank', '>=', $request['rank_from']);
                }

                if ($request->rank_to && $request->rank_to != '') {
                    $universities = $universities->where('universities.rank', '<=', $request['rank_to']);
                }

                $price_from = $universities->min('universities.price');
                $price_to = $universities->max('universities.price');
                $rank_from = $universities->min('universities.rank');
                $rank_to = $universities->max('universities.rank');

                $universities = $universities->select('universities.*')
                    ->distinct('universities.id')
                    ->orderBy('top', 'desc')->orderBy('number', 'desc')
                    ->paginate($items_per_page);


            } elseif ($request->search) {

                $universities = \App\Models\University::join('countries', 'countries.id', 'universities.country_id')
                    ->join('direction_university', 'direction_university.university_id', 'universities.id')
                    ->join('directions', 'directions.id', 'direction_university.direction_id')
                    ->join('direction_programm', 'direction_programm.direction_id', 'direction_university.direction_id')
                    ->join('programms', 'programms.id', 'direction_programm.programm_id')
                    ->where('universities.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.ielts', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.rank', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.price', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('programms.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('programms.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('programms.name_ru', 'like', '%' . $request->search . '%')
                    ->select('universities.*')
                    ->distinct('universities.id')
                    ->orderBy('universities.top', 'desc')
                    ->orderBy('universities.number', 'desc')
                    ->paginate($items_per_page);

                $price_from = $universities->min('universities.price');
                $price_to = $universities->max('universities.price');
                $rank_from = $universities->min('universities.rank');
                $rank_to = $universities->max('universities.rank');


            } else {
                $universities = \App\Models\University::orderBy('top', 'desc')->orderBy('number', 'desc')->paginate($items_per_page);
                $price_from = $universities->min('universities.price');
                $price_to = $universities->max('universities.price');
                $rank_from = $universities->min('universities.rank');
                $rank_to = $universities->max('universities.rank');
            }
        } else {
            $universities = \App\Models\University::orderBy('top', 'desc')->orderBy('number', 'desc')->paginate($items_per_page);
            $price_from = $universities->min('universities.price');
            $price_to = $universities->max('universities.price');
            $rank_from = $universities->min('universities.rank');
            $rank_to = $universities->max('universities.rank');
        }


        return view('front.programs.index', [
            'contact' => \App\Models\Contact::where('type', 1)->first(),
            'news' => \App\Models\News::orderBy('created_at', 'desc')->get(),
            'countries' => \App\Models\Country::join('universities', 'universities.country_id', 'countries.id')->select('countries.*')->orderBy('countries.name_en', 'asc')->get()->unique(),
            'programs_filter' => \App\Models\Programm::join('direction_university', 'direction_university.direction_id', 'programms.id')->orderBy('programms.name_en', 'asc')->select('programms.*')->get()->unique(),
            'universities' => $universities,
            'programs' => \App\Models\Programm::join('direction_programm', 'programms.id', '=', 'direction_programm.programm_id')->select('programms.id', 'programms.name_uz', 'programms.name_ru', 'programms.name_en')->orderBy('programms.id', 'asc')->get()->unique(),
            'locale' => \Illuminate\Support\Facades\App::getLocale(),
            'price_from' => $price_from,
            'price_to' => $price_to,
            'rank_from' => $rank_from,
            'rank_to' => $rank_to,
        ]);
    }

    public function cooperation(Request $request, $locale)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);

        $cooperation = new Cooperation();

        $cooperation->company_name = $request->company_name;
        $cooperation->position = $request->position;
        $cooperation->address = $request->address;
        $cooperation->message = $request->message;
        $cooperation->user_id = Auth::user()->id;
        $cooperation->status = 0;

        if ($cooperation->save()) {

            $text = "<b>Hamkorlik</b>" . PHP_EOL . PHP_EOL . "👨‍💼 <b>Taklif beruvchi :</b> " . Auth::user()->first_name . " " . Auth::user()->last_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . Auth::user()->phone_number . PHP_EOL . "📧 <b>Email :</b> " . Auth::user()->email . PHP_EOL . "📄 <b>Kompaniya :</b> " . $cooperation->company_name . PHP_EOL . "<b>👝 Lavozim :</b> " . $cooperation->position . PHP_EOL . "<b>🌐 Havola:</b> " . route('admin.cooperations.show', $cooperation->id) . PHP_EOL . PHP_EOL . "<b>Taklif</b> : " . $cooperation->message;

            Telegram::sendMessage(
                [
                    'chat_id' => 558076266,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]
            );

            return redirect()->back()->with(['success' => 'true']);
        } else {
            return redirect()->back()->with(['fail' => 'true']);
        }
    }

    public function message(Request $request, $locale)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|exists:users,email',
            'phone_number_1' => 'required|max:100',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);

        $message = new Application();

        $message->first_name = $request->first_name;
        $message->last_name = $request->last_name;
        $message->email = $request->email;
        $message->phone_number_1 = $request->phone_number_1;
        $message->phone_number_2 = $request->phone_number_2 != '' ? $request->phone_number_2 : null;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->certificate_status = $request->certificate_status - 1;

        if (Auth::user()) {
            $message->user_id = Auth::user()->id;
        }

        if ($request->university_id) {
            $this->validate($request, [
                'first_name' => 'required|max:100',
            ]);

            $message->university_id = $request->university_id;
        }

        if ($message->save()) {

            $ielts = ($request->certificate_status - 1) == 1 ? "Bor" : "Yo`q";

            $phone_number_2 = $request->phone_number_2 != '' ? PHP_EOL . "📞 <b>Telefon raqami 2:</b> " . $request->phone_number_2 : '';

            $text = "<b>Ariza</b>" . PHP_EOL . PHP_EOL . "👨‍💼 <b>Ariza beruvchi :</b> " . $request->first_name . " " . $request->last_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . $request->phone_number_1 . $phone_number_2 . PHP_EOL . "📧 <b>Email :</b> " . $request->email . PHP_EOL . "📄 <b>IELTS :</b> " . $ielts . PHP_EOL . PHP_EOL . "<b>Mavzu</b> : <i>" . $request->subject . '</i>' . PHP_EOL . "<b>Ariza</b> : " . $request->message;

            Telegram::sendMessage(
                [
                    'chat_id' => 558076266,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]
            );

            return redirect()->back()->with(['success' => 'true']);
        } else {
            return redirect()->back()->with(['fail' => 'true']);
        }
    }

    public function document(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'middle_name' => 'required|max:100',
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|exists:users,email',
            'phone_number' => 'required|max:100',
            'region' => 'required',
            'program' => 'required',
            'direction' => 'required',
            'photo' => 'required',
            'passport' => 'required',
            'diploma' => 'required',
            'certificate' => 'required',
            'certificates' => 'required',
            'university_id' => 'required',
            'university_name' => 'required',
        ]);

        $document = new Document();

        $document->status = 0;
        $document->user_id = Auth::user()->id;
        $document->university_id = $request->university_id;
        $document->programm_id = $request->program;
        $document->direction_id = $request->direction;

        //User Folder Create

        $document->folder_name = Auth::user()->id . "." . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . 'for_' . $request->university_id . '.' . $request->university_name . '_' . uniqid() . '_' . rand(0, 1000) . "_" . time();

        $user_path = public_path('storage/documents/' . $document->folder_name);

        File::makeDirectory($user_path, $mode = 0777, true, true);

        //photo

        $photo = $request->file("photo");

        $new_name_photo = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . $photo->getClientOriginalName();

        $path = $user_path . '/photo';

        File::makeDirectory($path, $mode = 0777, true, true);

        $photo->move($path, $new_name_photo);

        $document->photo = $new_name_photo;

        //passport

        $passport = $request->file('passport');

        $new_name_passport = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . $passport->getClientOriginalName();

        $path = $user_path . '/passport';

        File::makeDirectory($path, $mode = 0777, true, true);

        $passport->move($path, $new_name_passport);

        $document->passport = $new_name_passport;

        //diploma

        $diploma = $request->file('diploma');

        $new_name_diploma = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . $diploma->getClientOriginalName();

        $path = $user_path . '/diploma';

        File::makeDirectory($path, $mode = 0777, true, true);

        $diploma->move($path, $new_name_diploma);

        $document->diploma = $new_name_diploma;

        //certificate

        $certificate = $request->file('certificate');

        $new_name_certificate = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . $certificate->getClientOriginalName();

        $path = $user_path . '/certificate';

        File::makeDirectory($path, $mode = 0777, true, true);

        $certificate->move($path, $new_name_certificate);

        $document->certificate = $new_name_certificate;

        //certificates

        $certificates = $request->file('certificates');

        $new_name_certificates = uniqid() . '_' . rand(0, 1000) . "_" . time() . "_" . Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . Auth::user()->middle_name . '_' . $certificates->getClientOriginalName();

        $path = $user_path . '/other_certificates';

        File::makeDirectory($path, $mode = 0777, true, true);

        $certificates->move($path, $new_name_certificates);

        $document->certificates = $new_name_certificates;

        if ($document->save()) {

            $text = "<b>Hujjat</b>" . PHP_EOL . PHP_EOL . "👨‍💼 <b>Hujjat topshiruvchi :</b> " . Auth::user()->first_name . " " . Auth::user()->last_name . " " . Auth::user()->middle_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . Auth::user()->phone_number . PHP_EOL . "📧 <b>Email :</b> " . Auth::user()->email . PHP_EOL . PHP_EOL . "<b>🌐 Havola:</b> " . route('admin.documents.show', $document->id);

            Telegram::sendMessage(
                [
                    'chat_id' => 558076266,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]
            );

            return redirect()->back()->with(['success' => 'Documents Sent']);
        } else {
            return redirect()->back()->with(['fail' => 'Error Data']);
        }

    }

    public function search(Request $request)
    {
        return view('front.search.index', [
            'contact' => \App\Models\Contact::where('type', 1)->first(),
            'news' => \App\Models\News::orderBy('created_at', 'desc')->get(),
            'countries' => \App\Models\Country::join('universities', 'universities.country_id', 'countries.id')->select('countries.*')->orderBy('countries.name_en', 'asc')->get()->unique(),
            'programs' => \App\Models\Programm::join('direction_programm', 'programms.id', '=', 'direction_programm.programm_id')->select('programms.id', 'programms.name_uz', 'programms.name_ru', 'programms.name_en')->orderBy('programms.id', 'asc')->get()->unique(),
            'locale' => \Illuminate\Support\Facades\App::getLocale(),
        ]);
    }

    public function password_edit(Request $request, $locale)
    {
        $this->validate($request, [
            'current_password' => 'required|min:3',
            'new_password' => 'required|min:3|same:confirm_new_password',
        ]);
        if ($request->current_password == $request->new_password) {
            return redirect()->back()->with(['same' => 'Current Password and New Password cannot be same!']);
        }
        if (Hash::check($request->current_password, Auth::user()->password)) {
            $user = User::where('id', Auth::user()->id)->first();
            $user->password = bcrypt($request->new_password);
            if ($user->save()) {
                return redirect()->route('dashboard', $locale)->with(['success' => 'Password edited successfully!']);
            } else {
                return redirect()->route('dashboard', $locale)->with(['fail' => 'An error occured password edited successfully!']);
            }
        } else {
            return redirect()->back()->with(['incorrect' => 'Current password is incorrect!']);
        }

    }

    function profile_edit(Request $request, $locale)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'branch_id' => 'required|exists:Branches,id',
            'region_id' => 'required',
            'phone_number' => 'required',
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->branch_id = $request->branch_id;
        $user->region = $request->region_id;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->route('dashboard', $locale)->with(['success' => 'Profile edited successfully!']);
        } else {
            return redirect()->back()->with(['fail' => 'An error occured in editing profile!']);
        }
    }

    function videosDetail($lang, $id)
    {
        if (\Illuminate\Support\Facades\Auth::user()) {
            $user = \Illuminate\Support\Facades\Auth::user();
            $contact = \App\Models\Contact::where('branch_id', $user->branch_id)->first();
        } else {
            if (Session::get('main_branch') !== null) {
                if (Session::get('main_branch') == 'main') {
                    $contact = \App\Models\Contact::where('type', 1)->first();
                } else {
                    $contact = \App\Models\Contact::where('id', Session::get('main_branch'))->first();
                }
            } else {
                $contact = \App\Models\Contact::where('type', 1)->first();
            }
        }

        $video = \App\Models\Video::where('id', $id)->first();

        if (!$video) {
            return abort(404);
        }

        if ($video->type == 1) {

            $items_per_page = 9;

            $videos = \App\Models\Video::where('parent_id', $video->id)->orderBy('number', 'desc')->paginate($items_per_page);

            return view('front.videos.index', [
                'background' => $video->cover->getUrl(),
                'videos' => $videos,
                'video' => $video,
                'contact' => $contact,
                'testimonials' => \App\Models\Testimonial::take(9)->orderBy('created_at', 'desc')->get(),
                'news' => \App\Models\News::orderBy('created_at', 'desc')->get(),
                'programs' => \App\Models\Programm::join('direction_programm', 'programms.id', '=', 'direction_programm.programm_id')->select('programms.id', 'programms.name_uz', 'programms.name_ru', 'programms.name_en')->orderBy('programms.id', 'asc')->get()->unique(),
                'locale' => \Illuminate\Support\Facades\App::getLocale(),
            ]);
        } elseif ($video->type == 0) {
            return redirect()->to($video->file->getUrl());
        }


    }
}
