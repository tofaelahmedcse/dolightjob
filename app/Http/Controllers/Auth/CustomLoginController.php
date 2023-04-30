<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccActiveEmail;
use App\Models\general_setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomLoginController extends Controller
{
    public function user_custom_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required',
        ], [
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your Email',
            'phone_number.required' => 'Please Enter Your Phone Number',
            'password.required' => 'Please Enter Your Password',
            'confirm_password.required' => 'Please Enter Your Confirm Password',
        ]);


        $check_user = User::orderBy('id', 'desc')->first();
        if ($check_user) {
            $user_id = rand(000, 999) . $check_user->id;
        } else {
            $user_id = rand(000, 999) . rand(0, 9);
        }

        $check_email = User::where('email', $request->email)->first();
        if ($check_email) {
            return back()->with('email_error', 'Email Already Exists');
            exit();
        }

        $check_phone = User::where('phone_number', $request->phone_number)->first();
        if ($check_phone) {
            return back()->with('phone_error', 'Phone Number Already Exists');
            exit();
        }

        $gen = general_setting::first();
        $new_user = new User();
        $new_user->user_ref_id = $user_id;
        $new_user->balance = $gen->welcome_balance;
        $new_user->earning_bal = 0.00;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->phone_number = $request->phone_number;
        $new_user->password = Hash::make($request->password);
        $new_user->account_status = 1;
        $new_user->ver_code = null;
        $new_user->ver_link = time() . $user_id . rand(00000, 99999) . uniqid();
        $new_user->save();


        $to = $new_user->email;
        $url = route('user.activate.account', $new_user->ver_link);
        $msg = [
            'name' => $new_user->name,
            'url' => $url
        ];
        Mail::to($to)->send(new AccActiveEmail($msg));


        return redirect(route('login'))->with('register_success', 'We have send activation link to your email. Please activate your account.');

    }


    public function user_custom_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('admin.dashboard'));
        }
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('home'));
        }

        if (Auth::guard('subadmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('subadmin.dashboard'));
        }
        
        return redirect(route('login'))->with('user_login_error', 'Invalid Credentials');
    }

}
