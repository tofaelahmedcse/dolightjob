<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\general_setting;
use App\Repositories\JobRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class SubAdminJobController extends Controller
{

    private $JbRepository;


    public function __construct(JobRepository $JobRepository)
    {
        $this->JbRepository = $JobRepository;
    }


    public function all_jobs()
    {
        return view('subadmin.jobs.allJobs');
    }


    public function all_jobs_get(Request $request)
    {
        $jobs = $this->JbRepository->get_all_jobs($request);
        return response()->json([
            'notices' => $jobs,
            'view' => View::make('subadmin.jobs.include.allJobsTbl', compact('jobs'))->render(),
            'pagination' => (string)$jobs->links(),
            'count_ses' => count($jobs),
        ]);
    }


    public function job_details($id)
    {
        $job_edit = $this->JbRepository->get_job_details($id);
        $gen = general_setting::first();
        return view('subadmin.jobs.jobDetails', compact('job_edit', 'gen'));
    }

    public function job_details_update(Request $request)
    {

        $job_update = $this->JbRepository->job_update($request);
        return back()->with('success', 'Job Status Successfully Updated');
    }


    public function pending_jobs()
    {
        return view('subadmin.jobs.pendingJobs');
    }

    public function pending_jobs_get(Request $request)
    {
        $jobs = $this->JbRepository->get_pending_job($request);
        return response()->json([
            'notices' => $jobs,
            'view' => View::make('subadmin.jobs.include.allJobsTbl', compact('jobs'))->render(),
            'pagination' => (string)$jobs->links(),
            'count_ses' => count($jobs),
        ]);
    }


    public function approved_jobs()
    {
        return view('subadmin.jobs.approvedJobs');
    }


    public function approved_jobs_get(Request $request)
    {
        $jobs = $this->JbRepository->get_approved_job($request);
        return response()->json([
            'notices' => $jobs,
            'view' => View::make('subadmin.jobs.include.allJobsTbl', compact('jobs'))->render(),
            'pagination' => (string)$jobs->links(),
            'count_ses' => count($jobs),
        ]);
    }


    public function rejected_jobs()
    {
        return view('subadmin.jobs.rejectedJobs');
    }

    public function rejected_jobs_get(Request $request)
    {
        $jobs = $this->JbRepository->get_rejected_job($request);
        return response()->json([
            'notices' => $jobs,
            'view' => View::make('subadmin.jobs.include.allJobsTbl', compact('jobs'))->render(),
            'pagination' => (string)$jobs->links(),
            'count_ses' => count($jobs),
        ]);
    }
}
