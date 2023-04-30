<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\User;
use App\Models\user_deposit;
use App\Models\user_transfer_balance;
use App\Models\withdraw;
use Illuminate\Http\Request;

class SubAdminController extends Controller
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
        return view('subadmin.index', compact('total_users', 'active_users', 'inactive_users', 'blocked_users', 'total_jobs', 'total_approved_jobs', 'total_pending_jobs', 'total_rej_jobs', 'total_dep', 'total_app_dep',
            'total_pen_dep', 'total_rej_dep', 'total_with', 'total_app_with', 'total_pen_with', 'total_rej_with', 'recent_users', 'recent_jobs', 'recent_dep', 'recent_with', 'er_bal_trns', 't_user_dep_bal',
            't_user_ear_bal'));
    }
}
