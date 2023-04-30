<?php

namespace App\Repositories;

use App\Models\transaction;
use App\Models\User;
use App\Models\user_deposit;
use App\Models\user_notification;
use App\Repositories\Interfaces\DepositInterface;

class DepositRepository implements DepositInterface
{
    public function get_all_deposit($request)
    {
        $search = $request->searchdep;
        $all_deposit = user_deposit::where(function ($query) use ($search) {
                if ($search != null || $search != '') {
                    $query->where('transaction_id', $search);
                    $query->orWhere('amount', $search);
                    $query->orWhere('total_usd', $search);
                    $query->orWhere('sender_number', $search);
                    $query->orWhere('transaction_number', $search);
                }
            })
            ->with(['deposit_usr','deposit_tran','deposit_gway'])
            ->orderBy('id', 'desc')
            ->paginate(30);

        return $all_deposit;
    }

    public function get_pending_deposit($request)
    {
        $search = $request->searchdep;
        $all_deposit = user_deposit::where('status', 0)
            ->where(function ($query) use ($search) {
                if ($search != null || $search != '') {
                    $query->where('transaction_id', $search);
                    $query->orWhere('amount', $search);
                    $query->orWhere('total_usd', $search);
                    $query->orWhere('sender_number', $search);
                    $query->orWhere('transaction_number', $search);
                }
            })
            ->with(['deposit_usr','deposit_tran','deposit_gway'])
            ->orderBy('id', 'desc')
            ->paginate(30);


        return $all_deposit;
    }

    public function get_approved_deposit($request)
    {
        $search = $request->searchdep;
        $all_deposit = user_deposit::where('status', 1)
            ->where(function ($query) use ($search) {
                if ($search != null || $search != '') {
                    $query->where('transaction_id', $search);
                    $query->orWhere('amount', $search);
                    $query->orWhere('total_usd', $search);
                    $query->orWhere('sender_number', $search);
                    $query->orWhere('transaction_number', $search);
                }
            })
            ->with(['deposit_usr','deposit_tran','deposit_gway'])
            ->orderBy('id', 'desc')
            ->paginate(30);


        return $all_deposit;
    }

    public function get_rejected_deposit($request)
    {
        $search = $request->searchdep;
        $all_deposit = user_deposit::where('status', 2)
            ->where(function ($query) use ($search) {
                if ($search != null || $search != '') {
                    $query->where('transaction_id', $search);
                    $query->orWhere('amount', $search);
                    $query->orWhere('total_usd', $search);
                    $query->orWhere('sender_number', $search);
                    $query->orWhere('transaction_number', $search);
                }
            })
            ->with(['deposit_usr','deposit_tran','deposit_gway'])
            ->orderBy('id', 'desc')
            ->paginate(30);


        return $all_deposit;
    }

    public function update_deposit_status($request)
    {
        if ($request->status == 1) {
            $user_deposit = user_deposit::where('id', $request->edit_dep_id)->first();
            $user_deposit->status = 1;
            $user_deposit->save();

            $dep_tran = transaction::where('dep_id', $user_deposit->id)->first();
            if ($dep_tran) {
                $dep_tran->status = 1;
                $dep_tran->save();
            }


            $user = User::where('id', $user_deposit->user_id)->first();
            $user->balance = $user->balance + $user_deposit->amount;
            $user->save();


            $new_notification = new user_notification();
            $new_notification->user_id = $user->id;
            $new_notification->title = "Your deposit has been approved";
            $new_notification->description = $request->deposit_comment;
            $new_notification->type = 2;
            $new_notification->status = 1;
            $new_notification->is_view = 1;
            $new_notification->save();

            return 'approved';
            exit();

        } elseif ($request->status == 2) {
            $user_deposit = user_deposit::where('id', $request->edit_dep_id)->first();
            if ($user_deposit->status == 1) {
                $user = User::where('id', $user_deposit->user_id)->first();
                $user->balance = $user->balance + $user_deposit->amount;
                $user->save();
            }

            $user_deposit->status = 2;
            $user_deposit->save();


            $dep_tran = transaction::where('dep_id', $user_deposit->id)->first();
            if ($dep_tran) {
                $dep_tran->status = 2;
                $dep_tran->save();
            }


            $new_notification = new user_notification();
            $new_notification->user_id = $user_deposit->user_id;
            $new_notification->title = "Your deposit has been rejected";
            $new_notification->description = $request->with_comment;
            $new_notification->type = 2;
            $new_notification->status = 1;
            $new_notification->is_view = 1;
            $new_notification->save();

            return 'rejected';
            exit();

        } else {
            return 'not_fount';
            exit();
        }
    }


    public function delete_deposit($request)
    {
        $del_dep = user_deposit::where('id', $request->delete_dep_id)->first();

        if (!$del_dep){
            return 'dep_not_fount';
            exit();
        }
        $dep_tran = transaction::where('dep_id', $del_dep->id)
            ->where('user_id',$del_dep->user_id)
            ->where('type',1)
            ->delete();

        $del_dep->delete();

        return 'dep_deleted';
    }
}
