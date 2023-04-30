<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\User;
use App\Models\user_transfer_balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function all_transaction()
    {
        $transations = transaction::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('user.page.transaction', compact('transations'));
    }


    public function transfer_balance()
    {
        return view('user.page.transferBalance');
    }

    public function transfer_balance_save(Request $request)
    {
        $am = $request->trn_am;

        $check_am = is_numeric($am);

        if ($check_am) {
            if (Auth::user()->earning_bal < $am) {
                return back()->with('alert', 'Insufficient Earning Balance');
            } else {

                $new_trnsfer = new user_transfer_balance();
                $new_trnsfer->user_id = Auth::user()->id;
                $new_trnsfer->transfer_amount = $am;
                $new_trnsfer->save();

                $user = User::where('id', Auth::user()->id)->first();
                $user->balance = $user->balance + $am;
                $user->earning_bal = $user->earning_bal - $am;
                $user->save();

                return back()->with('success', 'Balance Successfully Transfered');


            }
        } else {
            return back()->with('alert', 'Please Enter Valid Amount');
        }
    }


}
