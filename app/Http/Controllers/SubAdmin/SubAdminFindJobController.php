<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\job_apply;
use App\Models\job_main_category;
use App\Models\job_sub_category;
use App\Models\region_country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubAdminFindJobController extends Controller
{
    public function find_job()
    {
        $all_reg = region_country::all();
        return view('subadmin.findjob.findJob',compact('all_reg'));
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


        $all_jobs = all_job::where(function ($query) use ($reg_fil,$mcat_filter,$scat_filter,$search_title){
            if (isset($reg_fil)) {
                $query->where('region_name',$reg_fil);
            }

            if (isset($mcat_filter) && $mcat_filter != 0) {
                $query->where('main_category',$mcat_filter);
            }

            if (isset($scat_filter) && $scat_filter != 0) {
                $query->where('sub_category',$scat_filter);
            }

            if (isset($search_title)) {
                if ($search_title != null || $search_title != '') {
                    $query->where('sub_category','LIKE','%'.$search_title.'%');
                }
            }

        })
            ->with('user')
            ->paginate(36);



        return response()->json([
            'notices' => $all_jobs,
            'view' => View::make('subadmin.findjob.include.findJobTbl', compact('all_jobs'))->render(),
            'pagination' => (string)$all_jobs->links(),
            'count' => count($all_jobs)
        ]);
    }


    public function find_job_details($id)
    {
        $job_details = all_job::where('id', $id)->first();
        $applied_user = job_apply::select('id', 'user_id', 'job_id')->where('job_id', $id)->get();
        return view('subadmin.findjob.jobDetails', compact('job_details', 'applied_user'));
    }
}
