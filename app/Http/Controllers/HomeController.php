<?php

namespace App\Http\Controllers;

use App\Models\user_device_ip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_agent = $request->userAgent();
        $bname = 'Unknown';
        $platform = 'Unknown';

        //First get the platform?
        if (preg_match('/linux/i', $user_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $user_agent)) {
            $platform = 'windows';
        }
        $ip = $request->getClientIp();

        $check_ip = user_device_ip::distinct()->select('user_id', 'device_ip', 'login_device')->where('user_id', Auth::user()->id)
            ->where('device_ip', $ip)
            ->where('login_device', $platform)
            ->first();

        if (!$check_ip) {
            $new_user_ip = new user_device_ip();
            $new_user_ip->user_id = Auth::user()->id;
            $new_user_ip->device_ip = $ip;
            $new_user_ip->login_device = $platform;
            $new_user_ip->save();
        }

        return redirect(route('user.dashboard'));
//        return view('user.index');
    }
}
