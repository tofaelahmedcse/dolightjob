<?php

namespace App\Repositories;

use App\Models\all_job;
use App\Models\user_notification;
use App\Repositories\Interfaces\JobInterface;

class JobRepository implements JobInterface
{
    public function get_all_jobs($request)
    {
        $type = $request->type;
        $searchjob = $request->searchjob;
        $jobs = all_job::select('id', 'user_id', 'job_title', 'job_status', 'est_job_cost', 'created_at')
            ->where(function ($query) use ($searchjob) {
                if (!empty($searchjob)) {
                    $query->where('job_title', $searchjob);
                    $query->orWhere('est_job_cost', $searchjob);
                }
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $jobs;
    }


    public function get_job_details($id)
    {
        $job_edit = all_job::where('id', $id)->first();
        return $job_edit;
    }


    public function job_update($request)
    {
        $update_job = all_job::where('id', $request->edit_job_id)->first();
        $update_job->job_status = $request->job_status;
        $update_job->save();


        $new_notification = new user_notification();
        $new_notification->user_id = $update_job->user_id;
        if ($request->job_status == 1) {
            $new_notification->title = "Your Job has been pending";
        } elseif ($request->job_status == 2) {
            $new_notification->title = "Your Job has been approved";
        } elseif ($request->job_status == 3) {
            $new_notification->title = "Your Job has been pushed";
        } elseif ($request->job_status == 4) {
            $new_notification->title = "Your Job has been rejected";
        } else {
            $new_notification->title = "Not Set";
        }

        $new_notification->description = $request->notification_details;
        $new_notification->type = 1;
        $new_notification->status = 1;
        $new_notification->is_view = 1;
        $new_notification->save();

        return 'job_updated';
    }


    public function job_update_status($request)
    {
        $update_job = all_job::where('id', $request->edit_job_id)->first();
        $update_job->job_status = $request->job_status;
        $update_job->save();

        return 'job_status_updated';
    }


    public function get_pending_job($request)
    {
        $searchjob = $request->searchjob;
        $jobs = all_job::select('id', 'user_id', 'job_title', 'job_status', 'est_job_cost', 'created_at')
            ->where('job_status', 1)
            ->where(function ($query) use ($searchjob) {
                if (!empty($searchjob)) {
                    $query->where('job_title', $searchjob);
                    $query->orWhere('est_job_cost', $searchjob);
                }
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $jobs;
    }

    public function get_approved_job($request)
    {
        $searchjob = $request->searchjob;
        $jobs = all_job::select('id', 'user_id', 'job_title', 'job_status', 'est_job_cost', 'created_at')
            ->where('job_status', 2)
            ->where(function ($query) use ($searchjob) {
                if (!empty($searchjob)) {
                    $query->where('job_title', $searchjob);
                    $query->orWhere('est_job_cost', $searchjob);
                }
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $jobs;
    }


    public function get_rejected_job($request)
    {
        $searchjob = $request->searchjob;
        $jobs = all_job::select('id', 'user_id', 'job_title', 'job_status', 'est_job_cost', 'created_at')
            ->where('job_status', 4)
            ->where(function ($query) use ($searchjob) {
                if ($searchjob != null || $searchjob != '') {
                    $query->where('job_title', $searchjob);
                    $query->orWhere('est_job_cost', $searchjob);
                }
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $jobs;
    }
}
