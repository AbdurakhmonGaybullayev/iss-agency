<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Cooperation;
use App\Models\Document;
use App\Models\News;
use App\Models\QandA;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Telegram\Bot\Laravel\Facades\Telegram;

class FrontController extends Controller
{

    public function programs(Request $request)
    {

        $items_per_page = 6;

        if (count($request->all()) != 0) {
            if ($request->country || $request->program || $request->direction || $request->ielts || $request->price_from || $request->price_to) {

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
                    if ($request->ielts == '9.5'){
                        $request->ielts = 0;
                    }
                    $universities = $universities->where('universities.ielts', $request->ielts);
                }

                if ($request->price_from) {
                    if ($request->price_from == ''){
                        $request->price_from = 0;
                    }
                    $universities = $universities->where('universities.price', '>=', $request['price_from']);
                }

                if ($request->price_to && $request->price_to != '') {
                    $universities = $universities->where('universities.price', '<=', $request['price_to']);
                }

                $universities_price = $universities->select('universities.price')
                    ->distinct('universities.id')
                    ->orderBy('universities.price', 'asc')
                    ->get()->unique();

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

                $universities_price = \App\Models\University::join('countries', 'countries.id', 'universities.country_id')
                    ->join('direction_university', 'direction_university.university_id', 'universities.id')
                    ->join('directions', 'directions.id', 'direction_university.direction_id')
                    ->where('universities.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.ielts', 'like', '%' . $request->search . '%')
                    ->orWhere('universities.price', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('countries.name_en', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_uz', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_ru', 'like', '%' . $request->search . '%')
                    ->orWhere('directions.name_en', 'like', '%' . $request->search . '%')
                    ->select('universities.price')
                    ->orderBy('universities.price', 'asc')
                    ->get()
                    ->unique();

            } else {
                $universities = \App\Models\University::orderBy('top', 'desc')->orderBy('number', 'desc')->paginate($items_per_page);
                $universities_price = \App\Models\University::orderBy('price', 'asc')->select('price')->get();
            }
        } else {
            $universities = \App\Models\University::orderBy('top', 'desc')->orderBy('number', 'desc')->paginate($items_per_page);
            $universities_price = \App\Models\University::orderBy('price', 'asc')->select('price')->get();
        }

        $price_from = $universities_price->first() ? $universities_price->first()->price : 0;
        $price_to = $universities_price->last() ? $universities_price->last()->price : 50000;


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

            $text = "<b>Hamkorlik</b>".PHP_EOL.PHP_EOL."👨‍💼 <b>Taklif beruvchi :</b> " . Auth::user()->first_name . " " . Auth::user()->last_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . Auth::user()->phone_number . PHP_EOL . "📧 <b>Email :</b> " . Auth::user()->email . PHP_EOL . "📄 <b>Kompaniya :</b> " . $cooperation->company_name . PHP_EOL . "<b>👝 Lavozim :</b> " . $cooperation->position .  PHP_EOL . "<b>🌐 Havola:</b> " . route('admin.cooperations.show', $cooperation->id) .  PHP_EOL .  PHP_EOL .  "<b>Taklif</b> : " . $cooperation->message;

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

            $phone_number_2 = $request->phone_number_2 != '' ?  PHP_EOL ."📞 <b>Telefon raqami 2:</b> " . $request->phone_number_2 : '';

            $text = "<b>Ariza</b>".PHP_EOL.PHP_EOL."👨‍💼 <b>Ariza beruvchi :</b> " . $request->first_name . " " . $request->last_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . $request->phone_number_1 . $phone_number_2 . PHP_EOL . "📧 <b>Email :</b> " . $request->email . PHP_EOL . "📄 <b>IELTS :</b> " . $ielts . PHP_EOL . PHP_EOL . "<b>Mavzu</b> : <i>" . $request->subject .'</i>' . PHP_EOL . "<b>Ariza</b> : " . $request->message;

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

            $text = "<b>Hujjat</b>".PHP_EOL.PHP_EOL."👨‍💼 <b>Hujjat topshiruvchi :</b> " . Auth::user()->first_name . " " . Auth::user()->last_name . " " . Auth::user()->middle_name . PHP_EOL . "📞 <b>Telefon raqami :</b> " . Auth::user()->phone_number . PHP_EOL . "📧 <b>Email :</b> " . Auth::user()->email . PHP_EOL . PHP_EOL . "<b>🌐 Havola:</b> " . route('admin.documents.show', $document->id);

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

    public function search(Request $request){


        return view('front.search.index', [
            'contact' => \App\Models\Contact::where('type', 1)->first(),
            'news' => \App\Models\News::orderBy('created_at', 'desc')->get(),
            'countries' => \App\Models\Country::join('universities', 'universities.country_id', 'countries.id')->select('countries.*')->orderBy('countries.name_en', 'asc')->get()->unique(),
            'programs' => \App\Models\Programm::join('direction_programm', 'programms.id', '=', 'direction_programm.programm_id')->select('programms.id', 'programms.name_uz', 'programms.name_ru', 'programms.name_en')->orderBy('programms.id', 'asc')->get()->unique(),
            'locale' => \Illuminate\Support\Facades\App::getLocale(),
        ]);
    }
}
