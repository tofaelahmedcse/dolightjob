<?php

namespace App\Http\Controllers\SubAdmin;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\transaction;
use App\Models\withdraw;
use App\Repositories\WithdrawRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class SubAdminWithdrawController extends Controller
{
    private $WithRepository;

    public function __construct(WithdrawRepository $WithdrawRepository)
    {
        $this->WithRepository = $WithdrawRepository;
    }

    public function all_withdraw()
    {
        $gen = general_setting::first();
        return view('subadmin.withdraw.allWithdraw',compact('gen'));
    }


    public function all_withdraw_get(Request $request)
    {
        $withdraw = $this->WithRepository->get_all_withraw($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $withdraw,
            'view' => View::make('subadmin.withdraw.include.allWithTbl', compact('withdraw','gen'))->render(),
            'pagination' => (string)$withdraw->links(),
            'count_ses' => count($withdraw),
        ]);
    }

    public function withdraw_status_change(Request $request)
    {
        $status_upd_withdraw = $this->WithRepository->withraw_status_change($request);
        if ($status_upd_withdraw == 'approved'){
            return back()->with('success', 'User Withdraw Successfully Approved');
        }elseif ($status_upd_withdraw == 'rejected'){
            return back()->with('success', 'User Withdraw Successfully Rejected');
        }elseif ($status_upd_withdraw == 'not_fount'){
            return back()->with('alert', 'User Withdraw Not Found');
        }else{
            return back()->with('alert', 'User Withdraw Not Found');
        }

    }


    public function withdraw_delete(Request $request)
    {
        $del_withdraw = $this->WithRepository->withraw_delete($request);

        if ($del_withdraw == "withdraw_delete"){
            return back()->with('success', 'User Withdraw Successfully Deleted');
            exit();
        }elseif ($del_withdraw == "withdraw_not_found"){
            return back()->with('alert', 'Withdraw Data Not Found');
            exit();
        }else{
            return back()->with('alert', 'Withdraw Data Not Found');
            exit();
        }

    }


    public function pending_withdraw()
    {
        $gen = general_setting::first();
        return view('subadmin.withdraw.pendingWithdraw',compact('gen'));
    }


    public function pending_withdraw_get(Request $request)
    {

        $withdraw = $this->WithRepository->get_pending_withraw($request);

        $gen = general_setting::first();

        return response()->json([
            'notices' => $withdraw,
            'view' => View::make('subadmin.withdraw.include.allWithTbl', compact('withdraw','gen'))->render(),
            'pagination' => (string)$withdraw->links(),
            'count_ses' => count($withdraw),
        ]);
    }


    public function approved_withdraw()
    {
        $gen = general_setting::first();
        return view('subadmin.withdraw.approvedWithdraw',compact('gen'));
    }

    public function approved_withdraw_get(Request $request)
    {
        $withdraw = $this->WithRepository->get_approved_withraw($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $withdraw,
            'view' => View::make('subadmin.withdraw.include.allWithTbl', compact('withdraw','gen'))->render(),
            'pagination' => (string)$withdraw->links(),
            'count_ses' => count($withdraw),
        ]);

    }


    public function rejected_withdraw()
    {
        $gen = general_setting::first();
        return view('subadmin.withdraw.rejectedWithdraw',compact('gen'));
    }

    public function rejected_withdraw_get(Request $request)
    {
        $withdraw = $this->WithRepository->get_rejected_withraw($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $withdraw,
            'view' => View::make('subadmin.withdraw.include.allWithTbl', compact('withdraw','gen'))->render(),
            'pagination' => (string)$withdraw->links(),
            'count_ses' => count($withdraw),
        ]);

    }
}
