<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    function sign_up(Request $request,$locale){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'branch_id' => 'required|exists:Branches,id',
            'region_id' => 'required',
            'phone_number' => 'required',
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
            'password' => 'required|min:3|same:confirm_password',
        ]);

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->branch_id = $request->branch_id;
        $user->region = $request->region_id;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $role_user = DB::table('role_user');

        $role_user->user_id = $user->id;
        $role_user->role_id = User::USER;

        if ($user->save() && $role_user->insert(['user_id'=>$user->id,'role_id'=>User::USER])) {
            Auth::logout();
            Auth::login($user);
            if ($request->foradmission != null){
                return redirect()->route('admission',['lang'=>$locale,'id'=>$request->foradmission]);
            }
            if ($request->forcooperation != null){
                return redirect()->route('cooperation',$locale);
            }
            return redirect()->route('home',$locale)->with(['success' => 'true']);
        } else {
            return redirect()->back()->with(['fail' => 'true']);
        }
    }

    public function logout($locale)
    {
        Auth::logout();
        return redirect()->route('home',$locale);
    }

    public function sign_in(Request $request,$locale){

        $this->validate($request, [
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|exists:users,email',
            'password' => 'required|min:3',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($request->foradmission != null){
                return redirect()->route('admission',['lang'=>$locale,'id'=>$request->foradmission]);
            }
            if ($request->forcooperation != null){
                return redirect()->route('cooperation',$locale);
            }
            return redirect()->route('home',$locale)->with(['success' => 'true']);
        } else {
            return redirect()->back()->with(['incorrect' => 'Wrong password']);
        }
    }


}
