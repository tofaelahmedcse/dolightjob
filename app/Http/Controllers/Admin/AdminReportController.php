<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\apply_member_report;
use App\Models\job_apply;
use App\Models\job_main_category;
use App\Models\job_report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminReportController extends Controller
{
    public function job_report()
    {
        return view('admin.report.jobReport');
    }


    public function job_report_get()
    {
        $all_report = job_report::all();
        return DataTables::of($all_report)
            ->addColumn('action', function ($all_report) {
                return '
                <button id="' . $all_report->id . '" onclick="editmaincat(this.id)" type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#editmaincategory">View</button>
                ';
            })
            ->editColumn('job_id', function ($all_report) {
                $job = all_job::select('id', 'job_title')->where('id', $all_report->job_id)->first();
                if ($job) {
                    return $job->job_title;
                } else {
                    return '';
                }
            })
            ->editColumn('user_id', function ($all_report) {
                $user = User::select('id', 'name')->where('id', $all_report->user_id)->first();
                if ($user) {
                    return $user->name;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function ($all_report) {
                return Carbon::parse($all_report->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function job_task_report()
    {
        return view('admin.report.jobTaskReport');
    }


    public function job_task_report_get()
    {
        $all_report = apply_member_report::where('is_review',0)->get();
        return DataTables::of($all_report)
            ->addColumn('action', function ($all_report) {
                return '
                <a href="'.route('admin.user.task.report.view',$all_report->id).'"><button type="button" class="btn btn-sm btn-light" >View</button></a>
                ';
            })
            ->editColumn('user_id', function ($all_report) {
                $user = User::select('id', 'name')->where('id', $all_report->user_id)->first();
                if ($user) {
                    return $user->name;
                } else {
                    return '';
                }
            })
            ->editColumn('applied_user_id', function ($all_report) {
                $user = User::select('id', 'name')->where('id', $all_report->applied_user_id)->first();
                if ($user) {
                    return $user->name;
                } else {
                    return '';
                }
            })
            ->editColumn('apply_id', function ($all_report) {
                $task = job_apply::select('id', 'task_name')->where('id', $all_report->apply_id)->first();
                if ($task) {
                    return $task->task_name;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function ($all_report) {
                return Carbon::parse($all_report->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function job_task_report_view($id)
    {
        $job_report = apply_member_report::where('id',$id)->first();
        return view('admin.report.jobTaskReportView',compact('job_report'));
    }

    public function job_task_report_make_reviewed($id)
    {
        $job_task = apply_member_report::where('id',$id)->first();
        $job_task->is_review = 1;
        $job_task->save();

        return back()->with('success','Task Report as Reviewed');
    }





}
