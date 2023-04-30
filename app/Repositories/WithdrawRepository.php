<?php

namespace App\Repositories;

use App\Models\transaction;
use App\Models\user_notification;
use App\Models\withdraw;
use App\Repositories\Interfaces\WithdrawInterface;

class WithdrawRepository implements WithdrawInterface
{
    public function get_all_withraw($request)
    {
        $searchwith = $request->searchwith;
        $withdraw = withdraw::with('user')
            ->where(function ($query) use ($searchwith){
                if ($searchwith != null || $searchwith != ''){
                    $query->where('transaction_id',$searchwith);
                    $query->orWhere('amount',$searchwith);
                    $query->orWhere('user_will_get',$searchwith);
                    $query->orWhere('receiver_number',$searchwith);
                }
            })
            ->orderBy('id','desc')
            ->paginate(30);

        return $withdraw;
    }


    public function get_pending_withraw($request)
    {
        $searchwith = $request->searchwith;

        $withdraw = withdraw::where('status', 0)
            ->where(function ($query) use ($searchwith){
                if ($searchwith != null || $searchwith != ''){
                    $query->where('transaction_id',$searchwith);
                    $query->orWhere('amount',$searchwith);
                    $query->orWhere('user_will_get',$searchwith);
                    $query->orWhere('receiver_number',$searchwith);
                }
            })
            ->with('user')
            ->orderBy('id','desc')
            ->paginate(30);

        return $withdraw;
    }

    public function get_approved_withraw($request)
    {
        $searchwith = $request->searchwith;
        $withdraw = withdraw::where('status', 1)
            ->where(function ($query) use ($searchwith){
                if ($searchwith != null || $searchwith != ''){
                    $query->where('transaction_id',$searchwith);
                    $query->orWhere('amount',$searchwith);
                    $query->orWhere('user_will_get',$searchwith);
                    $query->orWhere('receiver_number',$searchwith);
                }
            })
            ->with('user')
            ->orderBy('id','desc')
            ->paginate(30);
        return $withdraw;
    }

    public function get_rejected_withraw($request)
    {
        $searchwith = $request->searchwith;
        $withdraw = withdraw::where('status', 2)
            ->where(function ($query) use ($searchwith){
                if ($searchwith != null || $searchwith != ''){
                    $query->where('transaction_id',$searchwith);
                    $query->orWhere('amount',$searchwith);
                    $query->orWhere('user_will_get',$searchwith);
                    $query->orWhere('receiver_number',$searchwith);
                }
            })
            ->with('user')
            ->orderBy('id','desc')
            ->paginate(30);
        return $withdraw;
    }


    public function withraw_status_change($request)
    {
        $type = $request->status;
        if ($type == 1) {
            $user_with = withdraw::where('id', $request->edit_with_id)->first();
            $user_with->status = 1;
            $user_with->with_comment = $request->with_comment;
            $user_with->save();

            $user_tran = transaction::where('user_id', $user_with->user_id)->where('with_id', $user_with->id)->first();
            $user_tran->status = 1;
            $user_tran->save();


            $new_notification = new user_notification();
            $new_notification->user_id = $user_tran->user_id;
            $new_notification->title = "Your withdraw request has been approved";
            $new_notification->description = $request->with_comment;
            $new_notification->type = 3;
            $new_notification->status = 1;
            $new_notification->is_view = 1;
            $new_notification->save();

            return 'approved';
            exit();

        } elseif ($type == 2) {
            $user_with = withdraw::where('id', $request->edit_with_id)->first();
            $user_with->status = 2;
            $user_with->save();

            $user_tran = transaction::where('user_id', $user_with->user_id)->where('with_id', $user_with->id)->first();
            $user_tran->status = 2;
            $user_tran->save();

            $new_notification = new user_notification();
            $new_notification->user_id = $user_tran->user_id;
            $new_notification->title = "Your withdraw request has been rejected";
            $new_notification->description = $request->with_comment;
            $new_notification->type = 3;
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

    public function withraw_delete($request)
    {
        $with_del = withdraw::where('id', $request->delete_with_id)->first();

        if (!$with_del){
            return 'withdraw_not_found';
            exit();
        }

        $user_tran = transaction::where('with_id', $with_del->id)
            ->where('user_id', $with_del->user_id)
            ->where('type', 2)
            ->delete();

        $with_del->delete();

        return 'withdraw_delete';
    }
}
