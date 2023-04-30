<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user_device_ip;
use Illuminate\Http\Request;

class AdminUserIpController extends Controller
{
    public function user_ip()
    {
        $users_ips = user_device_ip::orderBy('id', 'desc')->paginate(15);
        return view('admin.userip.ipList', compact('users_ips'));
    }


    public function user_ip_details($id)
    {
        $get_ips = user_device_ip::where('id', $id)->first();
        $user_ips = user_device_ip::where('device_ip', $get_ips->device_ip)->paginate(15);
        return view('admin.userip.ipDetails', compact('user_ips', 'get_ips'));
    }

}
