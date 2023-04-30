<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\gateway;
use App\Models\general_setting;
use App\Models\transaction;
use App\Models\user_activity;
use App\Models\user_deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserDepositController extends Controller
{
    public function deposit()
    {
        $payment_gateway = gateway::where('is_active', 1)->get();
        $gen_settings = general_setting::first();
        $all_deposit = user_deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('user.deposit.deposit', compact('payment_gateway', 'gen_settings', 'all_deposit'));
    }

    public function deposit_save(Request $request)
    {

        $gateway = gateway::where('id', $request->deposit_type)->first();
        if ($request->amount < $gateway->min_price) {
            return back()->with('alert', 'Deposit Amount must be min ' . $gateway->min_price);
            exit();
        }

        if ($request->amount > $gateway->max_price) {
            return back()->with('alert', 'Deposit Amount must be max ' . $gateway->min_price);
            exit();
        }


        $user_deposit_save = new user_deposit();
        $user_deposit_save->user_id = Auth::user()->id;
        $user_deposit_save->transaction_id = time() . Auth::user()->id . rand(0000, 9999);
        $user_deposit_save->gateway_id = $request->deposit_type;
        $user_deposit_save->amount = $request->amount;
        $user_deposit_save->usd_rate = $request->usd_rate;
        $user_deposit_save->total_usd = $request->total_usd;
        $user_deposit_save->transaction_number = $request->transaction_number;
        $user_deposit_save->sender_number = $request->sender_number;
        $user_deposit_save->status = 0;
        $user_deposit_save->save();


        $new_trans = new transaction();
        $new_trans->user_id = Auth::user()->id;
        $new_trans->dep_id = $user_deposit_save->id;
        $new_trans->with_id = 0;
        $new_trans->transaction_id = $user_deposit_save->transaction_id;
        $new_trans->transaction_name = "Deposit " . $request->amount;
        $new_trans->amount = $user_deposit_save->amount;
        $new_trans->total_usd = $user_deposit_save->total_usd;
        $new_trans->status = 0;
        $new_trans->type = 1;
        $new_trans->save();


        $act = new user_activity();
        $act->user_id = Auth::user()->id;
        $act->activity = "Deposit Amount" . $new_trans->amount . '. ' . "TRX ID : " . $new_trans->transaction_id;
        $act->created_date = Carbon::now()->format('Y-m-d');
        $act->save();


        return back()->with('success', 'Deposit Successfully Created');
    }


    public function deposit_gate_get_details(Request $request)
    {
        $single_gateway = gateway::where('id', $request->dep_id)->first();
        return response($single_gateway);
    }


}
