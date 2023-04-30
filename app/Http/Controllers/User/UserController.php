<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\all_job;
use App\Models\withdraw;
use Jenssegers\Agent\Agent;
use App\Models\user_deposit;
use Illuminate\Http\Request;
use App\Models\user_activity;
use App\Models\user_device_ip;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request)
    {

        //        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //            //ip from share internet
        //            $ip = $_SERVER['HTTP_CLIENT_IP'];
        //        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //            //ip pass from proxy
        //            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //        } else {
        //            $ip = $_SERVER['REMOTE_ADDR'];
        //        }
        //        return $ip;


        $user_agent = $request->userAgent();

        $bname = 'Unknown';


        //First get the platform?
        if (preg_match('/linux/i', $user_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $user_agent)) {
            $platform = 'windows';
        } else {
            $platform = 'Unknown';
        }

        //        return $request->ip();


        //        $agent = new Agent();
        //        $result1 = $agent->version($platform);
        //        return $result1;


        $total_jobs = all_job::select('id', 'user_id')->where('user_id', Auth::user()->id)->count();
        $pen_jobs = all_job::select('id', 'user_id')->where('user_id', Auth::user()->id)->where('job_status', 1)->count();
        $app_jobs = all_job::select('id', 'user_id', 'job_status')->where('user_id', Auth::user()->id)->where('job_status', 2)->count();
        $rej_jobs = all_job::select('id', 'user_id', 'job_status')->where('user_id', Auth::user()->id)->where('job_status', 4)->count();
        $to_dep = user_deposit::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->sum('amount');
        $pen_dep = user_deposit::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 0)->sum('amount');
        $app_dep = user_deposit::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 1)->sum('amount');
        $rej_dep = user_deposit::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 2)->sum('amount');
        $tot_wid = withdraw::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->sum('amount');
        $pen_wid = withdraw::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 0)->sum('amount');
        $app_wid = withdraw::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 1)->sum('amount');
        $rej_wid = withdraw::select('id', 'user_id', 'amount', 'status')->where('user_id', Auth::user()->id)->where('status', 2)->sum('amount');
        $recent_jobs = all_job::select('id', 'user_id', 'job_title', 'est_job_cost', 'created_at')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
        $recent_dep = user_deposit::select('id', 'user_id', 'amount', 'status', 'created_at')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
        $recent_with = withdraw::select('id', 'user_id', 'amount', 'status', 'created_at')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();


        return view('user.index', compact(
            'total_jobs',
            'pen_jobs',
            'app_jobs',
            'rej_jobs',
            'to_dep',
            'pen_dep',
            'app_dep',
            'rej_dep',
            'tot_wid',
            'pen_wid',
            'app_wid',
            'rej_wid',
            'recent_jobs',
            'recent_dep',
            'recent_with'
        ));
    }

    public function my_profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.page.myProfile', compact('user'));
    }

    public function my_profile_update(Request $request)
    {
        $update_profile = User::where('id', Auth::user()->id)->first();
        $update_profile->name = $request->name;
        $update_profile->phone_number = $request->phone_number;
        $update_profile->website = $request->website;
        $update_profile->city = $request->city;
        $update_profile->country = $request->country;
        $update_profile->zip_code = $request->zip_code;
        $update_profile->description = $request->description;
        $update_profile->save();



        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Profile Updated";
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();

        return back()->with('success', 'Profile Successfully Updated');
    }

    public function avatarUpdate(Request $request)
    {

        // dd($request->avatar);
        if ($request->hasfile('avatar')) {
            $deleteoldphoto = Auth::user()->avatar;
            if ($deleteoldphoto) {
                $path = public_path('images/') . $deleteoldphoto;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $photo_upload = $request->avatar;
            $filename = time() . '.' . $photo_upload->getClientOriginalExtension();
            $request->avatar->move(public_path('images/'), $filename);
            User::find(Auth::user()->id)->update([
                'avatar' => $filename
            ]);
        }
        return back();
    }


    public function change_password()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $devices = user_device_ip::where('user_id', Auth::user()->id)->get();
        return view('user.page.changePassword', compact('user', 'devices'));
    }

    public function change_password_update(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;

        if ($npass != $cpass) {
            return back()->with('alert', 'Password Not Match');
        } elseif (strlen($npass) < 8 || strlen($cpass) < 8) {
            return back()->with('alert', 'Password should be min 8 char');
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();

            $act = new user_activity();
            $act->user_id = Auth::user()->id;
            $act->activity = "Account Password Changed";
            $act->created_date = Carbon::now()->format('Y-m-d');
            $act->save();


            return back()->with('success', 'Password Successfully Changed');
        }
    }


    public function lockScreen()
    {

        \Session::put('locked', true);

        // return redirect('locked')
        // ->with('flash', 'Account Locked Successfully!');

        return view('user.lockscreen')->with('flash', 'Account Locked Successfully!');;
    }
    public function unLockScreen(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $check = Hash::check($request->input('password'), $request->user()->password);

        if (!$check) {
            return redirect()->route('user.lockscreen')->withErrors([
                'Your password does not match your profile.'
            ]);
        }

        session()->forget('locked', true);



        return redirect()->route('user.dashboard');
    }

    public function wallet()
    {
        return view('user.wallet.wallet');
    }
}
