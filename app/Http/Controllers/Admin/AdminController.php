<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\all_job;
use App\Models\general_setting;
use App\Models\User;
use App\Models\user_deposit;
use App\Models\user_transfer_balance;
use App\Models\withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $total_users = User::select('id')->count();
        $active_users = User::select('id', 'account_status')->where('account_status', 2)->count();
        $inactive_users = User::select('id', 'account_status')->where('account_status', 1)->count();
        $blocked_users = User::select('id', 'account_status')->where('account_status', 3)->count();
        $total_jobs = all_job::select('id')->count();
        $total_approved_jobs = all_job::select('id', 'job_status')->where('job_status', 2)->count();
        $total_pending_jobs = all_job::select('id', 'job_status')->where('job_status', 1)->count();
        $total_rej_jobs = all_job::select('id', 'job_status')->where('job_status', 4)->count();
        $total_dep = user_deposit::select('id', 'amount')->sum('amount');
        $total_app_dep = user_deposit::select('id', 'amount', 'status')->where('status', 1)->sum('amount');
        $total_pen_dep = user_deposit::select('id', 'amount', 'status')->where('status', 0)->sum('amount');
        $total_rej_dep = user_deposit::select('id', 'amount', 'status')->where('status', 2)->sum('amount');
        $total_with = withdraw::select('id', 'amount')->sum('amount');
        $total_app_with = withdraw::select('id', 'amount', 'status')->where('status', 1)->sum('amount');
        $total_pen_with = withdraw::select('id', 'amount', 'status')->where('status', 0)->sum('amount');
        $total_rej_with = withdraw::select('id', 'amount', 'status')->where('status', 2)->sum('amount');
        $recent_users = User::select('id', 'name', 'email', 'phone_number', 'created_at')->orderBy('id', 'desc')->take(5)->get();
        $recent_jobs = all_job::select('id', 'user_id', 'job_title', 'est_job_cost', 'created_at')->orderBy('id', 'desc')->take(5)->get();
        $recent_dep = user_deposit::select('id', 'user_id', 'amount', 'status', 'created_at')->orderBy('id', 'desc')->take(5)->get();
        $recent_with = withdraw::select('id', 'user_id', 'amount', 'status', 'created_at')->orderBy('id', 'desc')->take(5)->get();
        $er_bal_trns = user_transfer_balance::sum('transfer_amount');
        $t_user_dep_bal = User::sum('balance');
        $t_user_ear_bal = User::sum('earning_bal');
        return view('admin.index', compact('total_users', 'active_users', 'inactive_users', 'blocked_users', 'total_jobs', 'total_approved_jobs', 'total_pending_jobs', 'total_rej_jobs', 'total_dep', 'total_app_dep',
            'total_pen_dep', 'total_rej_dep', 'total_with', 'total_app_with', 'total_pen_with', 'total_rej_with', 'recent_users', 'recent_jobs', 'recent_dep', 'recent_with', 'er_bal_trns', 't_user_dep_bal',
            't_user_ear_bal'));
    }

    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSettings', compact('gen'));
    }


    public function general_settings_save(Request $request)
    {
        $gen = general_setting::first();
        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->welcome_balance = $request->welcome_balance;
        $gen->site_address = $request->site_address;
        $gen->is_under_main = $request->is_under_main;
        $gen->usd_rate = $request->usd_rate;
        $gen->service_charge = $request->service_charge;
        $gen->job_auto_post = $request->job_auto_post;
        $gen->auto_post_date = $request->auto_post_date;
        $gen->job_post_min_amt = $request->job_post_min_amt;
        $gen->screenshot_price = $request->screenshot_price;
        $gen->site_currency = $request->site_currency;
        $gen->default_job_msg = $request->default_job_msg;
        $gen->default_dep_msg = $request->default_dep_msg;
        $gen->default_with_msg = $request->default_with_msg;
        $gen->das_noti_msg = $request->das_noti_msg;
        $gen->dep_noti_msg = $request->dep_noti_msg;
        $gen->with_noti_msg = $request->with_noti_msg;
        $gen->with_ser_charge = $request->with_ser_charge;
        $gen->job_unsatis_limit = $request->job_unsatis_limit;
        $gen->save();
        return back()->with('success', 'General Settings Successfully Updated');
    }

    public function profile()
    {
        return view('admin.page.profile');
    }

    public function profile_save(Request $request)
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->save();
        return back()->with('success','Profile Successfully Updated');
    }

}
