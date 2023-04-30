<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\all_job_country;
use App\Models\apply_member_report;
use App\Models\general_setting;
use App\Models\job_apply;
use App\Models\job_main_category;
use App\Models\job_report;
use App\Models\job_sub_category;
use App\Models\region_country;
use App\Models\User;
use App\Models\user_activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class UserJobController extends Controller
{
    public function post_job()
    {
        $all_reg = region_country::distinct()->select('region')->where('region', '!=', '')->get();
        $gen_settings = general_setting::first();
        return view('user.job.postJob', compact('all_reg', 'gen_settings'));
    }

    public function post_job_get_all_main_cat(Request $request)
    {
        $main_cats = job_main_category::where('region_name', $request->reg_name)->orderBy('category_name', 'ASC')->get();

        return response()->json($main_cats, 200);
    }

    public function post_job_get_all_sub_cat(Request $request)
    {
        $sub_cats = job_sub_category::where('main_cat_id', $request->main_cat)->orderBy('category_name', 'ASC')->get();
        return response()->json($sub_cats);
    }

    public function post_job_get_sub_cat_price(Request $request)
    {
        $sub_cat_price = job_sub_category::where('id', $request->sub_cat_id)->first();
        return response()->json($sub_cat_price);
    }

    public function post_job_save(Request $request)
    {


        $gen_set = general_setting::first();

        if (Auth::user()->balance < $request->est_job_cost) {
            return response()->json('balance_error', 200);
        }


        $check_job = all_job::select('id', 'job_id')->orderBy('id', 'desc')->count();
        $job_count = $check_job + 1;

        if ($job_count < 10) {
            $job_id = '0000' . $job_count;
        } elseif ($job_count >= 10 && $job_count <= 99) {
            $job_id = '000' . $job_count;
        } elseif ($job_count >= 100 && $job_count <= 999) {
            $job_id = '00' . $job_count;
        } elseif ($job_count >= 1000 && $job_count <= 9999) {
            $job_id = '0' . $job_count;
        } else {
            $job_id = $job_count;
        }

        $new_job = new all_job();


        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = Auth::user()->id . time() . '.png';
            $directory = 'assets/dashboard/images/jobthumbnail/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_job->thumbnail = $imgUrl;
        }


        $charge1 = (number_format($request->est_job_cost) * $gen_set->service_charge);
        $charge = $charge1 / 100;


        $new_job->user_id = Auth::user()->id;
        $new_job->job_id = $job_id;
        $new_job->region_name = $request->region_name;
        $new_job->main_category = $request->main_category;
        $new_job->sub_category = $request->sub_category;
        $new_job->job_title = $request->job_title;
        $new_job->specific_task = $request->specific_task;
        $new_job->require_proof = $request->require_proof;
        $new_job->worker_need = $request->worker_need;
        $new_job->each_worker_earn = $request->each_worker_earn;
        $new_job->screenshot = $request->screenshot;
        $new_job->est_day = $request->est_day;
        $new_job->est_job_cost = $request->est_job_cost;
        $new_job->admin_income = $charge;

        if ($gen_set->job_auto_post == 1) {
            $new_job->job_status = 2;
        } else {
            $new_job->job_status = 1;
        }

        $new_job->save();

        $data = $request->all();

        if (isset($data['country_name'])) {
            for ($i = 0; $i < count($data['country_name']); $i++) {

                $coun_name = region_country::where('id', $data['country_name'][$i])->first();

                $new_coun = new all_job_country();
                $new_coun->user_id = Auth::user()->id;
                $new_coun->job_id = $new_job->id;
                $new_coun->country_id = isset($coun_name) ? $coun_name->id : 0;
                $new_coun->country_name = isset($coun_name) ? $coun_name->country_name : null;
                $new_coun->save();
            }
        }


        $user = User::where('id', Auth::user()->id)->first();
        $user->balance = $user->balance - $new_job->est_job_cost;
        $user->save();


        $act = new user_activity();
        $act->user_id = $user->id;
        $act->activity = "Created New Job. JOB ID : " . $new_job->job_id;
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();



        return response()->json('job_created', 200);
    }


    public function find_job()
    {
        $all_reg = region_country::distinct()->select('region')->where('region', '!=', '')->get();
        return view('user.job.findJob', compact('all_reg'));
    }


    public function job_find_coun_by_reg(Request $request)
    {
        $country = region_country::where('region', $request->reg_fil)->get();
        return response()->json($country, 200);
    }

    public function job_find_mcat_by_reg(Request $request)
    {
        $m_cats = job_main_category::where('region_name', $request->reg_fil)->get();
        return response()->json($m_cats);
    }

    public function job_find_scat_by_mcat(Request $request)
    {
        $s_cats = job_sub_category::where('region_name', $request->reg_fil)
            ->where('main_cat_id', $request->mcat_filter)
            ->get();
        return response()->json($s_cats);
    }


    public function find_job_get_all(Request $request)
    {
        $reg_fil = $request->reg_fil;
        $country_filter = $request->country_filter;
        $mcat_filter = $request->mcat_filter;
        $scat_filter = $request->scat_filter;
        $search_title = $request->search_title;


        // return $mcat_filter;

        $all_jobs = all_job::where('job_status', 2)
            ->where(function ($query) use ($reg_fil, $mcat_filter, $scat_filter, $search_title) {
                if (isset($reg_fil)) {
                    $query->where('region_name', $reg_fil);
                }

                if (isset($mcat_filter)) {
                    $query->where('main_category', $mcat_filter);
                }

                if (isset($scat_filter)) {
                    $query->where('sub_category', $scat_filter);
                }

                if (isset($search_title)) {
                    if ($search_title != null || $search_title != '') {
                        $query->where('job_title', 'LIKE', '%' . $search_title . '%');
                        $query->orWhere('specific_task', 'LIKE', '%' . $search_title . '%');
                    }
                }
            })
            ->with('user')
            ->paginate(36);


        // return response()->json($all_jobs);

        return response()->json([
            'notices' => $all_jobs,
            'view' => View::make('user.job.include.findJobTbl', compact('all_jobs'))->render(),
            'pagination' => (string)$all_jobs->links(),
            'count' => count($all_jobs)
        ]);
    }

    public function find_job_get_all_next(Request $request)
    {
        $reg_fil = $request->reg_fil;
        $country_filter = $request->country_filter;
        $mcat_filter = $request->mcat_filter;
        $scat_filter = $request->scat_filter;
        $search_title = $request->search_title;


        $all_jobs = all_job::where('job_status', 2)
            ->where(function ($query) use ($reg_fil, $mcat_filter, $scat_filter, $search_title) {
                if (isset($reg_fil)) {
                    $query->where('region_name', $reg_fil);
                }

                if (isset($mcat_filter) && $mcat_filter != 0) {
                    $query->where('main_category', $mcat_filter);
                }

                if (isset($scat_filter) && $scat_filter != 0) {
                    $query->where('sub_category', $scat_filter);
                }

                if (isset($search_title)) {
                    if ($search_title != null || $search_title != '') {
                        $query->where('sub_category', 'LIKE', '%' . $search_title . '%');
                    }
                }
            })
            ->with('user')
            ->paginate(36);



        return response()->json([
            'notices' => $all_jobs,
            'view' => View::make('user.job.include.findJobTbl', compact('all_jobs'))->render(),
            'pagination' => (string)$all_jobs->links(),
            'count' => count($all_jobs)
        ]);
    }


    public function job_details($id)
    {
        $job_details = all_job::where('id', $id)->first();
        $applied_user = job_apply::select('id', 'user_id', 'job_id')->where('job_id', $id)->get();
        return view('user.job.jobDetails', compact('job_details', 'applied_user'));
    }


    public function job_report_submit(Request $request)
    {
        $new_report = new job_report();
        $new_report->user_id = Auth::user()->id;
        $new_report->job_id = $request->job_id;
        $new_report->report_summery = $request->report_summery;
        $new_report->save();
        return back()->with('success', 'Job Report Submited Successfully');
    }


    public function job_apply($id)
    {
        $gen_set = general_setting::first();


        $new_job_apply = new job_apply();
        $new_job_apply->user_id = Auth::user()->id;
        $new_job_apply->job_id = $id;
        $new_job_apply->task_name = "TASK-" . Auth::user()->id . time();
        $new_job_apply->end_time = null;
        $new_job_apply->status = 0;
        $new_job_apply->is_submit = 0;
        if ($gen_set->auto_post_date == 1) {
            $new_job_apply->auto_approve_date = Carbon::now()->addDay($gen_set->auto_post_date);
        } else {
            $new_job_apply->auto_approve_date = Carbon::now()->addDays($gen_set->auto_post_date);
        }
        $new_job_apply->submi_end_date = Carbon::now()->addDay(1);
        $new_job_apply->save();


        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Applied New Job";
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();

        return back()->with('success', 'Job Successfully Applied');
    }

    public function job_apply_submit(Request $request)
    {
        $apply_submit = job_apply::where('id', $request->apply_id)->first();

        if ($request->hasFile('prove_one')) {
            $image = $request->file('prove_one');
            $imageName = Auth::user()->id . time() . '.png';
            $directory = 'assets/dashboard/images/jobthumbnail/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $apply_submit->prove_one = $imgUrl;
        }

        if ($request->hasFile('prove_two')) {
            $image = $request->file('prove_two');
            $imageName = Auth::user()->id . time() . '.png';
            $directory = 'assets/dashboard/images/applyprove/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $apply_submit->prove_two = $imgUrl;
        }

        $apply_submit->answer = $request->answer;
        $apply_submit->status = 1;
        $apply_submit->is_submit = 1;
        $apply_submit->save();


        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Submit Job";
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();

        return back()->with('success', 'Prove Submitted Successful');
    }


    public function job_apply_members($id)
    {
        $job_details = all_job::where('id', $id)->first();
        $apply_jobs = job_apply::where('job_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('user.job.jobApplyMembers', compact('job_details', 'apply_jobs'));
    }

    public function job_apply_members_change_status(Request $request)
    {

        $gen = general_setting::first();

        if ($request->is_sat == 2) {
            $count_unsatis = job_apply::where('status', 3)->count();

            $check_limit = ($count_unsatis * $gen->job_unsatis_limit);
            $percen = $check_limit / 100;


            if ((int)$percen >= $count_unsatis) {
                return back()->with('alert', 'Your job Unsatisfied limit is ' . $gen->job_unsatis_limit . ' You have cross your Unsatisfied limit');
                exit();
            }
        }






        $job_apply = job_apply::where('id', $request->apply_id)->first();
        $job_apply->is_sat = $request->is_sat;
        if ($request->is_sat == 2) {
            $job_apply->un_satic_comment = $request->un_satic_comment;
        } else {
            $request->un_satic_comment = null;
        }

        $job_apply->rating = $request->rating;
        if ($request->is_sat == 1) {
            $job_apply->status = 2;
        } else {
            $job_apply->status = 3;
        }

        $job_apply->save();

        if ($request->is_sat == 1) {
            $job = all_job::where('id', $job_apply->job_id)->first();
            $user = User::where('id', $job_apply->user_id)->first();
            $user->earning_bal = $user->earning_bal + $job->each_worker_earn;
            $user->save();
        }


        return back()->with('success', 'Job Apply Status Changed Successfully');
    }

    public function job_apply_members_report(Request $request)
    {
        $appy_data = job_apply::where('id', $request->report_apply_id)->first();

        $new_report = new apply_member_report();
        $new_report->user_id = Auth::user()->id;
        $new_report->applied_user_id = $appy_data->user_id;
        $new_report->apply_id = $request->report_apply_id;
        $new_report->job_id = $appy_data->job_id;
        $new_report->report_desc = $request->report_desc;
        $new_report->is_review = 0;
        $new_report->save();

        return back()->with('success', 'Report Submitted Successfully');
    }


    public function job_edit($id)
    {
        $job_edit = all_job::where('id', $id)->first();
        $sub_cat = job_sub_category::where('id', $job_edit->sub_category)->first();
        $gen_settings = general_setting::first();
        return view('user.job.editJob', compact('job_edit', 'sub_cat', 'gen_settings'));
    }


    public function job_update(Request $request)
    {
        $job_update = all_job::where('id', $request->job_edit_id)->first();

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = Auth::user()->id . time() . '.png';
            $directory = 'assets/dashboard/images/jobthumbnail/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $job_update->thumbnail = $imgUrl;

            $job_update->job_status = 1;
        }

        $job_update->job_title = $request->job_title;
        $job_update->specific_task = $request->specific_task;
        $job_update->worker_need = $job_update->worker_need + $request->worker_need;
        $job_update->est_job_cost = $request->est_job_cost;

        if ($job_update->job_title != $request->job_title) {
            $job_update->job_status = 1;
        } elseif ($job_update->specific_task != $request->specific_task) {
            $job_update->job_status = 1;
        } else {
        }

        $job_update->save();


        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Job Updated. JOB ID : " . $job_update->job_id;
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();

        return back()->with('success', 'Job Successfully Updated');
    }


    public function job_delete($id)
    {
        $job_delete = all_job::where('id', $id)->first();
        $job_apply = job_apply::where('job_id', $id)
            ->where('status', 1)
            ->count();

        $job_creator = User::where('id', $job_delete->user_id)->first();


        if ($job_delete) {
            if ($job_apply > 0) {
                $total_user_need = $job_delete->worker_need - $job_apply;
                $count_bal = $total_user_need * $job_delete->each_worker_earn;

                $job_creator->balance = $job_creator->balance + $count_bal;
                $job_creator->save();

                $del_app_mem = job_apply::where('job_id', $id)->delete();

                $job_delete->delete();
            } else {
                $count_bal = $job_delete->worker_need * $job_delete->each_worker_earn;
                $job_creator->balance = $job_creator->balance + $count_bal;
                $job_creator->save();

                $del_app_mem = job_apply::where('job_id', $id)->delete();

                $job_delete->delete();
            }

            return back()->with('success', 'Job Successfully Deleted');
        } else {
            return back()->with('alert', 'Job Not Found');
        }
    }


    public function my_jobs()
    {
        $my_jobs = all_job::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('user.job.myJobs', compact('my_jobs'));
    }


    public function my_tasks()
    {
        $my_tasks = job_apply::where('user_id', Auth::user()->id)->paginate(20);
        return view('user.job.myTask', compact('my_tasks'));
    }


    public function arrayPaginator($array, $request)
    {
        $page = $request->get('page', 1);
        $perPage = 12;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($array, $offset, $perPage, true),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }
}
