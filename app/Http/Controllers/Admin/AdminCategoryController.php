<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\all_job_country;
use App\Models\apply_member_report;
use App\Models\job_apply;
use App\Models\job_main_category;
use App\Models\job_report;
use App\Models\job_sub_category;
use App\Models\region_country;
use App\Models\SubAdmin;
use App\Models\transaction;
use App\Models\User;
use App\Models\user_activity;
use App\Models\user_deposit;
use App\Models\user_device_ip;
use App\Models\user_notification;
use App\Models\user_transfer_balance;
use App\Models\withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminCategoryController extends Controller
{
    public function main_category()
    {

        //        User::truncate();
        //        all_job::truncate();
        //        all_job_country::truncate();
        //        apply_member_report::truncate();
        //        job_apply::truncate();
        //        job_main_category::truncate();
        //        job_report::truncate();
        //        job_sub_category::truncate();
        //        SubAdmin::truncate();
        //        transaction::truncate();
        //        user_activity::truncate();
        //        user_deposit::truncate();
        //        user_device_ip::truncate();
        //        user_notification::truncate();
        //        user_transfer_balance::truncate();
        //        withdraw::truncate();


        $all_reg = region_country::distinct()->select('region')->get();
        return view('admin.category.mainCategory', compact('all_reg'));
    }


    public function main_category_get()
    {
        $all_main_cats = job_main_category::all();
        return DataTables::of($all_main_cats)
            ->addColumn('action', function ($all_main_cats) {
                return '
                <button id="' . $all_main_cats->id . '" onclick="editmaincat(this.id)" type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#editmaincategory">Edit</button>
                <button id="' . $all_main_cats->id . '" onclick="deletemaincat(this.id)"  type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#deletemaincategory">Delete</button>
                ';
            })
            ->editColumn('created_at', function ($all_main_cats) {
                return Carbon::parse($all_main_cats->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function main_category_save(Request $request)
    {

        $new_cat = new job_main_category();
        $new_cat->region_name = $request->region_name;
        $new_cat->country_id = $request->country_id;
        $new_cat->category_name = $request->cat_name;
        $new_cat->save();
        return response()->json('done', 200);
    }


    public function main_category_single(Request $request)
    {
        $single_main_cat = job_main_category::where('id', $request->id)->first();
        return response()->json($single_main_cat, 200);
    }


    public function main_category_update(Request $request)
    {
        $update_cat = job_main_category::where('id', $request->edit_main_cat_id)->first();
        $update_cat->region_name = $request->update_region;
        $update_cat->country_id = $request->update_country;
        $update_cat->category_name = $request->edit_cat_name;
        $update_cat->save();
        return response()->json('done', 200);
    }

    public function main_category_delete(Request $request)
    {
        $delete_main_cat = job_main_category::where('id', $request->delete_main_cat_id)->first();
        if ($delete_main_cat) {
            $delete_main_cat->delete();
        }

        return response()->json('done', 200);
    }


    //sub category
    public function sub_category()
    {
        $all_reg = region_country::distinct()->select('region')->get();
        return view('admin.category.subCategory', compact('all_reg'));
    }

    public function sub_category_get_maincat(Request $request)
    {
        $all_main_cat = job_main_category::all();
        return response()->json($all_main_cat);
    }

    public function sub_category_get()
    {
        $all_main_cats = job_sub_category::all();
        return DataTables::of($all_main_cats)
            ->addColumn('action', function ($all_main_cats) {
                return '
                <button id="' . $all_main_cats->id . '" onclick="editsubcat(this.id)" type="button" class="btn btn-sm btn-light " data-bs-toggle="modal" data-bs-target="#editsubcategory">Edit</button>
                <button id="' . $all_main_cats->id . '" onclick="deletesubcat(this.id)"  type="button" class="btn btn-sm btn-light " data-bs-toggle="modal" data-bs-target="#deletesubcategory">Delete</button>
               ';
            })
            ->editColumn('country_id', function ($all_main_cats) {
                $country = region_country::select('id', 'country_name')->where('id', $all_main_cats->country_id)->first();
                if ($country) {
                    return $country->country_name;
                } else {
                    return '';
                }
            })
            ->editColumn('main_cat_id', function ($all_main_cats) {
                $main_cat = job_main_category::where('id', $all_main_cats->main_cat_id)->first();
                if ($main_cat) {
                    return $main_cat->category_name;
                } else {
                    return '';
                }
            })
            ->editColumn('category_price', function ($all_main_cats) {
                return number_format($all_main_cats->category_price, 3);
            })
            ->editColumn('created_at', function ($all_main_cats) {
                return Carbon::parse($all_main_cats->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function sub_category_save(Request $request)
    {



        $new_sub_cat = new job_sub_category();
        $new_sub_cat->region_name = $request->create_region;
        $new_sub_cat->country_id = $request->create_country;
        $new_sub_cat->main_cat_id = $request->main_cat_id;
        $new_sub_cat->category_name = $request->sub_cat_name;
        $new_sub_cat->category_price = $request->sub_cat_price;
        $new_sub_cat->save();
        return response()->json('done', 200);
    }

    public function sub_category_single(Request $request)
    {
        $single_sub_cat = job_sub_category::where('id', $request->id)->first();
        return response($single_sub_cat, 200);
    }

    public function sub_category_update(Request $request)
    {
        $update_sub_cat = job_sub_category::where('id', $request->edit_sub_cat_id)->first();
        $update_sub_cat->region_name = $request->update_region;
        $update_sub_cat->country_id = $request->update_country;
        $update_sub_cat->main_cat_id = $request->edit_main_cat_id;
        $update_sub_cat->category_name = $request->edit_sub_cat_name;
        $update_sub_cat->category_price = $request->edit_sub_cat_price;
        $update_sub_cat->save();
        return response()->json('done', 200);
    }


    public function sub_category_delete(Request $request)
    {
        $delete_sub_cat = job_sub_category::where('id', $request->delete_sub_cat_id)->first();
        if ($delete_sub_cat) {
            $delete_sub_cat->delete();
        }
        return response()->json('done', 200);
    }
}
