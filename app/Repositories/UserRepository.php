<?php

namespace App\Repositories;

use App\Models\all_job;
use App\Models\job_apply;
use App\Models\transaction;
use App\Models\User;
use App\Models\user_deposit;
use App\Models\user_notification;
use App\Models\user_transfer_balance;
use App\Models\withdraw;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    public function get_all_users($request)
    {
        $searchuser = $request->searchuser;
        $users = User::where(function ($query) use ($searchuser) {
            if ($searchuser != null || $searchuser != '') {
                $query->where('name', $searchuser);
                $query->orWhere('email', $searchuser);
                $query->orWhere('phone_number', $searchuser);
            }
        })
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $users;
    }

    public function get_active_users($request)
    {
        $searchuser = $request->searchuser;
        $users = User::where('account_status', 2)
            ->where(function ($query) use ($searchuser) {
                if ($searchuser != null || $searchuser != '') {
                    $query->where('name', $searchuser);
                    $query->orWhere('email', $searchuser);
                    $query->orWhere('phone_number', $searchuser);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $users;
    }

    public function get_inactive_users($request)
    {
        $searchuser = $request->searchuser;
        $users = User::where('account_status', 1)
            ->where(function ($query) use ($searchuser) {
                if ($searchuser != null || $searchuser != '') {
                    $query->where('name', $searchuser);
                    $query->orWhere('email', $searchuser);
                    $query->orWhere('phone_number', $searchuser);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $users;
    }

    public function get_blocked_users($request)
    {
        $searchuser = $request->searchuser;
        $users = User::where('account_status', 3)
            ->where(function ($query) use ($searchuser) {
                if ($searchuser != null || $searchuser != '') {
                    $query->where('name', $searchuser);
                    $query->orWhere('email', $searchuser);
                    $query->orWhere('phone_number', $searchuser);
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $users;
    }

    public function update_user($request)
    {
        $update_profile = User::where('id', $request->user_id)->first();
        $update_profile->name = $request->name;
        $update_profile->balance = $request->balance;
        $update_profile->phone_number = $request->phone_number;
        $update_profile->website = $request->website;
        $update_profile->city = $request->city;
        $update_profile->country = $request->country;
        $update_profile->zip_code = $request->zip_code;
        $update_profile->description = $request->description;
        $update_profile->account_status = $request->account_status;
        $update_profile->save();
        return 'user_updated';
    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->first();

        all_job::where('user_id', $id)->delete();
        job_apply::where('user_id', $id)->delete();
        user_deposit::where('user_id', $id)->delete();
        withdraw::where('user_id', $id)->delete();
        transaction::where('user_id', $id)->delete();
        user_transfer_balance::where('user_id', $id)->delete();
        user_notification::where('user_id', $id)->delete();

        $user->delete();

        return 'user_deleted';
    }
}
