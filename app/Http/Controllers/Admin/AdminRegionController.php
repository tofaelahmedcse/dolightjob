<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\job_main_category;
use App\Models\region_country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminRegionController extends Controller
{
    public function region_country()
    {
        $all_reg = region_country::distinct()->select('region')->get();
        return view('admin.region.regionCountry',compact('all_reg'));
    }

    public function region_country_get()
    {
        $all_region_country = region_country::all();

        return DataTables::of($all_region_country)
            ->addColumn('action', function ($all_region_country) {
                return '
                <button id="' . $all_region_country->id . '" onclick="editreg(this.id)" type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#editreg">Edit</button>
                <button id="' . $all_region_country->id . '" onclick="deletereg(this.id)"  type="button" class="btn btn-sm btn-light delreg" data-bs-toggle="modal" data-bs-target="#deletereg">Delete</button>
                ';
            })
            ->editColumn('created_at', function ($all_region_country) {
                return Carbon::parse($all_region_country->created_at)->format('d-F-Y');
            })
            ->make(true);
    }

    public function region_country_get_all(Request $request)
    {
        $all_reg = region_country::distinct()->select('id', 'region')->where('region', '!=', '')->get();
        return response()->json($all_reg, 200);
    }


    public function country_get_all(Request $request)
    {
        $all_reg = region_country::where('region', $request->reg_name)->get();
        return response()->json($all_reg, 200);
    }

    public function main_category_by_country(Request $request)
    {
        $main_cats = job_main_category::where('region_name', $request->country)->get();
        return response()->json($main_cats, 200);
    }


    public function main_category_by_region(Request $request)
    {

        $main_cats = job_main_category::where('region_name', $request->country)->get();
        return response()->json($main_cats, 200);
    }


    public function region_country_save(Request $request)
    {
        $new_reg = new region_country();
        $new_reg->region = $request->region_name;
        $new_reg->country_name = $request->country_name;
        $new_reg->save();
        return back()->with('success','Region and Country Successfully Created');
    }


    public function region_country_single(Request $request)
    {
        $sing_reg = region_country::where('id',$request->id)->first();
        return response()->json($sing_reg,200);
    }


    public function region_country_update(Request $request)
    {
        $new_reg = region_country::where('id',$request->region_edit)->first();
        $new_reg->region = $request->region_name;
        $new_reg->country_name = $request->country_name;
        $new_reg->save();
        return back()->with('success','Region and Country Successfully updated');
    }


    public function region_country_delete(Request $request)
    {
        $del_reg = region_country::where('id',$request->delete_reg_id)->first();
        $del_reg->delete();
        return back()->with('success','Region and Country Successfully Deleted');
    }


}
