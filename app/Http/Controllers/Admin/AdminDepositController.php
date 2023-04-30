<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\all_job;
use App\Models\general_setting;
use App\Models\transaction;
use App\Models\User;
use App\Models\user_deposit;
use App\Models\user_notification;
use App\Repositories\DepositRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class AdminDepositController extends Controller
{

    private $DepRepository;

    public function __construct(DepositRepository $DepositRepository)
    {
        $this->DepRepository = $DepositRepository;
    }

    public function all_deposit(Request $request)
    {
        $all_deposit = $this->DepRepository->get_all_deposit($request);
//        return $all_deposit;
        $gen = general_setting::first();
        return view('admin.deposit.allDeposit', compact('gen'));
    }

    public function all_deposit_get(Request $request)
    {
        $all_deposit = $this->DepRepository->get_all_deposit($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $all_deposit,
            'view' => View::make('admin.deposit.include.allDepTbl', compact('all_deposit', 'gen'))->render(),
            'pagination' => (string)$all_deposit->links(),
            'count_ses' => count($all_deposit),
        ]);
    }

    public function pending_deposit()
    {
        $gen = general_setting::first();
        return view('admin.deposit.pendingDeposit', compact('gen'));
    }


    public function pending_deposit_get(Request $request)
    {
        $all_deposit = $this->DepRepository->get_pending_deposit($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $all_deposit,
            'view' => View::make('admin.deposit.include.allDepTbl', compact('all_deposit', 'gen'))->render(),
            'pagination' => (string)$all_deposit->links(),
            'count_ses' => count($all_deposit),
        ]);
    }


    public function approved_deposit()
    {
        $gen = general_setting::first();
        return view('admin.deposit.approvedDeposit', compact('gen'));
    }


    public function approved_deposit_get(Request $request)
    {
        $all_deposit = $this->DepRepository->get_approved_deposit($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $all_deposit,
            'view' => View::make('admin.deposit.include.allDepTbl', compact('all_deposit', 'gen'))->render(),
            'pagination' => (string)$all_deposit->links(),
            'count_ses' => count($all_deposit),
        ]);
    }


    public function rejected_deposit()
    {
        $gen = general_setting::first();
        return view('admin.deposit.rejectedDeposit', compact('gen'));
    }


    public function rejected_deposit_get(Request $request)
    {
        $all_deposit = $this->DepRepository->get_rejected_deposit($request);
        $gen = general_setting::first();
        return response()->json([
            'notices' => $all_deposit,
            'view' => View::make('admin.deposit.include.allDepTbl', compact('all_deposit', 'gen'))->render(),
            'pagination' => (string)$all_deposit->links(),
            'count_ses' => count($all_deposit),
        ]);
    }


    public function deposit_change_status(Request $request)
    {
        $up_status_deposit = $this->DepRepository->update_deposit_status($request);
        if ($up_status_deposit == 'approved'){
            return back()->with('success', 'Deposit Successfully Approved');
        }elseif ($up_status_deposit == 'rejected'){
            return back()->with('success', 'Deposit Successfully Rejected');
        }elseif ($up_status_deposit == 'not_fount'){
            return back()->with('alert', 'Deposit Not Found');
        }else{
            return back()->with('alert', 'Deposit Not Found');
        }
    }

    public function deposit_delete(Request $request)
    {
        $del_dep = $this->DepRepository->delete_deposit($request);

        if ($del_dep == "dep_deleted"){
            return back()->with('success', 'Deposit Successfully Deleted');
            exit();
        }elseif ($del_dep == "dep_not_fount"){
            return back()->with('alert', 'Deposit Data Not Found');
            exit();
        }else{
            return back()->with('alert', 'Deposit Data Not Found');
            exit();
        }

    }
}
