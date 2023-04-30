<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ActivationController extends Controller
{
    public function user_active_account($link)
    {
        $user = User::where('ver_link',$link)->first();
        if ($user){
            $user->account_status = 2;
            $user->save();
            return redirect(route('login'))->with('email_verify_success','Account Successfully Verified. Please login your account');
        }else{
            return redirect(route('login'))->with('email_verify_error','Your account is not verified. Verified link is valid');
        }
    }


    public function forgot_password()
    {
        return view('auth.userForgotPassword');
    }

    public function forgot_password_submit(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user){
            $user->ver_code = rand(000000,999999);
            $user->ver_link = Str::random(15).time().$user->id.rand(00000,99999).uniqid();
            $user->save();

            $to = $user->email;
            $msg = [
                'name' => $user->name,
                'code' => $user->ver_code
            ];
            Mail::to($to)->send(new ForgetPasswordMail($msg));

            return redirect(route('forgot.password.verify.code'))->with('code_send','We have send verification to your mail.');
        }else{
            return back()->with('email_error','Email not found.');
        }
    }


    public function forgot_password_verify_code()
    {
        return view('auth.userForgotPasswordCode');
    }


    public function forgot_password_verify_code_check(Request $request)
    {
        $user = User::where('ver_code',$request->code)->first();
        if ($user){
            return redirect(route('forgot.password.change.pass',$user->ver_link));
        }else{
            return back()->with('code_error','Verification code is  not valid.');
        }
    }


    public function forgot_password_change_password($link)
    {
        return view('auth.userForPassChangPass',compact('link'));
    }


    public function forgot_password_change_password_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass){
            return back()->with('not_match','Password not match');
        }elseif (strlen($npass) < 8 ||  strlen($cpass) < 8){
            return back()->with('not_match','Password must be at last 8 characters');
        }else{
            $user = User::where('ver_link',$request->vlink)->first();
            $user->password = Hash::make($npass);
            $user->ver_code = null;
            $user->ver_link = null;
            $user->save();
            return redirect(route('login'))->with('fpass_success','Password successfully changed. Please login your account');
        }

    }






}
