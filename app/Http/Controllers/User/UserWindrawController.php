<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\gateway;
use App\Models\general_setting;
use App\Models\transaction;
use App\Models\user_activity;
use App\Models\withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserWindrawController extends Controller
{
    public function withdraw()
    {
        $payment_gateway = gateway::where('is_active',1)->get();
        $gen_settings = general_setting::first();
        $user_withdraw = withdraw::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('user.withdraw.withdraw',compact('payment_gateway','gen_settings','user_withdraw'));
    }

    public function withdraw_save(Request $request)
    {

        if ($request->amount < 0 || $request->amount == 0 || $request->amount = 0.00){
            return back()->with('alert','Please Enter Amount');
            exit();
        }

        if (Auth::user()->earning_bal < $request->amount || Auth::user()->earning_bal <= 0){
            return back()->with('alert','Insufficient Balance');
            exit();
        }


        $new_with = new withdraw();
        $new_with->user_id = Auth::user()->id;
        $new_with->transaction_id = time().Auth::user()->id.rand(0000,9999);
        $new_with->withdraw_type = $request->withdraw_type;
        $new_with->amount = $request->amount;
        $new_with->usd_rate = $request->usd_rate;
        $new_with->total_usd = $request->total_usd;
        $new_with->receiver_number = $request->receiver_number;
        $new_with->user_will_get = $request->final_am;
        $new_with->status = 0;
        $new_with->admin_income = ($request->amount - $request->final_am);
        $new_with->save();



        $new_trans = new transaction();
        $new_trans->user_id = Auth::user()->id;
        $new_trans->dep_id = 0;
        $new_trans->with_id = $new_with->id;
        $new_trans->transaction_id = $new_with->transaction_id;
        $new_trans->transaction_name = "Withdraw ".$request->amount;
        $new_trans->amount = $new_with->amount;
        $new_trans->total_usd = $new_with->total_usd;
        $new_trans->status = 0;
        $new_trans->type = 2;
        $new_trans->admin_income = $new_with->admin_income;
        $new_trans->save();


        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Withdraw Request Send".$new_trans->amount.'. '."TRX ID : ".$new_trans->transaction_id;
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();


        return back()->with('success','Withdraw Request Send Successfully');
    }

}
