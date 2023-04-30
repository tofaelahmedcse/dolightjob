<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class SubAdminUsersController extends Controller
{

    private $UsrRepository;


    public function __construct(UserRepository $UserRepository)
    {
        $this->UsrRepository = $UserRepository;
    }

    public function all_users()
    {
        return view('subadmin.users.allUsers');
    }

    public function all_users_get(Request $request)
    {
        $users = $this->UsrRepository->get_all_users($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $users,
            'view' => View::make('subadmin.users.include.incUsrTbl', compact('users','gen'))->render(),
            'pagination' => (string)$users->links(),
            'count_ses' => count($users),
        ]);

    }


    public function active_users()
    {
        return view('subadmin.users.activeUsers');
    }

    public function active_users_get(Request $request)
    {
        $users = $this->UsrRepository->get_active_users($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $users,
            'view' => View::make('subadmin.users.include.incUsrTbl', compact('users','gen'))->render(),
            'pagination' => (string)$users->links(),
            'count_ses' => count($users),
        ]);

    }


    public function inactive_users()
    {
        return view('subadmin.users.inactiveUsers');
    }


    public function inactive_users_get(Request $request)
    {
        $users = $this->UsrRepository->get_inactive_users($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $users,
            'view' => View::make('subadmin.users.include.incUsrTbl', compact('users','gen'))->render(),
            'pagination' => (string)$users->links(),
            'count_ses' => count($users),
        ]);

    }


    public function blocked_users()
    {
        return view('subadmin.users.blockedUsers');
    }

    public function blocked_users_get(Request $request)
    {
        $users = $this->UsrRepository->get_blocked_users($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $users,
            'view' => View::make('subadmin.users.include.incUsrTbl', compact('users','gen'))->render(),
            'pagination' => (string)$users->links(),
            'count_ses' => count($users),
        ]);

    }


    public function user_details($id)
    {
        $user = User::where('id', $id)->first();
        return view('subadmin.users.userDetails', compact('user'));
    }

    public function user_details_update(Request $request)
    {
        $users = $this->UsrRepository->update_user($request);
        return back()->with('success', 'Profile Successfully Updated');
    }


    public function user_delete($id)
    {
        $users = $this->UsrRepository->update_user($id);
        return redirect(route('subadmin.all.users'))->with('success', 'User Successfully Deleted');


    }


    public function user_change_password($id)
    {
//        return request()->userAgent();

        $user = User::where('id', $id)->first();

        return view('subadmin.users.changePassword', compact('user'));
    }

    public function user_change_password_update(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;

        if ($npass != $cpass) {
            return back()->with('alert', 'Password Not Match');
        } elseif (strlen($npass) < 8 || strlen($cpass) < 8) {
            return back()->with('alert', 'Password should be min 8 char');
        } else {
            $user = User::where('id', $request->user_id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('success', 'Password Successfully Changed');
        }
    }


}
