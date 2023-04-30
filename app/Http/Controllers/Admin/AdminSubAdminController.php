<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\job_main_category;
use App\Models\region_country;
use App\Models\SubAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminSubAdminController extends Controller
{
    public function all_sub_admins()
    {
        return view('admin.subadmin.allSubadmins');
    }


    public function all_sub_admins_get()
    {
        $all_sub_admins = SubAdmin::all();
        return DataTables::of($all_sub_admins)
            ->addColumn('action', function ($all_sub_admins) {
                return '
                <button id="' . $all_sub_admins->id . '" onclick="editsubadmin(this.id)" type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#editsubadminmodal">Edit</button>
                <button id="' . $all_sub_admins->id . '" onclick="deletesubadmin(this.id)"  type="button" class="btn btn-sm btn-light editcatmd" data-bs-toggle="modal" data-bs-target="#deletesubadminmodal">Delete</button>
                ';
            })
            ->editColumn('created_at', function ($all_sub_admins) {
                return Carbon::parse($all_sub_admins->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function sub_admins_save(Request $request)
    {
        $new_sub_admin = new SubAdmin();
        $new_sub_admin->name = $request->name;
        $new_sub_admin->email = $request->email;
        $new_sub_admin->phone_number = $request->phone_number;
        $new_sub_admin->password = Hash::make($request->password);
        $new_sub_admin->save();
        return back()->with('success','Sub-Admin Account Successfully Created');

    }


    public function sub_admins_single(Request $request)
    {
        $single_sub_admin = SubAdmin::where('id',$request->id)->first();
        return response()->json($single_sub_admin,200);
    }

    public function sub_admins_update(Request $request)
    {
        $update_sub_admin = SubAdmin::where('id',$request->edit_sub_admin)->first();
        $update_sub_admin->name = $request->name;
        $update_sub_admin->email = $request->email;
        $update_sub_admin->phone_number = $request->phone_number;
        if ($request->password != null || $request->password != ''){
            $update_sub_admin->password = Hash::make($request->password);
        }

        $update_sub_admin->save();
        return back()->with('success','Sub-Admin Account Successfully Updated');
    }


    public function sub_admins_delete(Request $request)
    {
        $sub_admin_delete = SubAdmin::where('id',$request->delete_sub_admin)->first();
        $sub_admin_delete->delete();
        return back()->with('success','Sub-Admin Account Successfully Deleted');
    }



}
