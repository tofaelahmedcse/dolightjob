<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\UserUpload;
use App\Models\gateway;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGatewayController extends Controller
{
    public function payment_gateway()
    {
        $gateway = gateway::all();
        return view('admin.gateway.paymentGateway', compact('gateway'));
    }

    public function payment_gateway_edit($id)
    {
        $gateway_edit = gateway::where('id', $id)->first();
        return view('admin.gateway.paymentGatewayEdit', compact('gateway_edit'));
    }


    public function payment_gateway_update(Request $request, $filename = '', $delimiter = ',')
    {


//        $image = $request->file('file_csv');
//
//        $filename1 = public_path() . '/csv';
//        $name = "arbucketcomment.csv";
//        $image->move($filename1, $name);
//
//        $filename = public_path('/csv/arbucketcomment.csv') . '';
//
//        $file = fopen($filename, 'r');
//
//        while (!feof($file)) {
//            while (($row = fgetcsv($file, 1000, $delimiter)) !== false) {
//
//                $data[] = mb_convert_encoding($row, 'UTF-8', 'HTML-ENTITIES');
//
//
//                if ($row == null) {
//                    break;
//                }
//            }
//        }
//
//        fclose($file);
//        unlink($filename);
//
//        $chunks = array_chunk($data, 300);
//        if ($data != null || !empty($data)) {
//            foreach ($chunks as $chuck_data) {
//                UserUpload::dispatch($chuck_data);
//            }
//        }
//
//
//        return 'done';


        $update_gateway = gateway::where('id', $request->gateway_edit)->first();
        $update_gateway->gateway_name = $request->gateway_name;
        $update_gateway->gateway_number = $request->gateway_number;
        $update_gateway->gateway_note = $request->gateway_note;
        $update_gateway->min_price = $request->min_price;
        $update_gateway->max_price = $request->max_price;
        $update_gateway->is_active = $request->is_active;
        $update_gateway->save();
        return back()->with('success', 'Payment Gateway Successfully Updated');
    }

}
