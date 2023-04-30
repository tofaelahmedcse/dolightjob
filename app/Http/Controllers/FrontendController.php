<?php

namespace App\Http\Controllers;

use App\Models\user_deposit;
use App\Models\withdraw;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class FrontendController extends Controller
{
    public function index()
    {

        $faker = Faker::create();

        foreach (range(1, 500000) as $index) {
            //            $new_dep = new user_deposit();
            //            $new_dep->user_id = 9685;
            //            $new_dep->gateway_id = 1;
            //            $new_dep->amount = rand(100,1000);
            //            $new_dep->usd_rate = 95.00;
            //            $new_dep->total_usd = 100.00;
            //            $new_dep->sender_number = '231231231';
            //            $new_dep->transaction_number = '231231231';
            //            $new_dep->status = rand(0,2);
            //            $new_dep->deposit_comment = 'new commect';
            //            $new_dep->save();



            //            $new_with = new withdraw();
            //            $new_with->user_id = 9685;
            //            $new_with->transaction_id = rand(00000,99999);
            //            $new_with->withdraw_type = 1;
            //            $new_with->amount = 1.25;
            //            $new_with->usd_rate = 1.25;
            //            $new_with->total_usd = 1.5625;
            //            $new_with->user_will_get = 1.225;
            //            $new_with->receiver_number = '01707934022';
            //            $new_with->status = rand(0,2);
            //            $new_with->with_comment = 1;
            //            $new_with->save();

        }

        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }


    public function terms_conditions()
    {
        return view('frontend.treamsCondition');
    }

    public function privacy_policy()
    {
        return view('frontend.privacyPolicy');
    }


    public function forum()
    {
        return view('frontend.forum');
    }
    public function webDev()
    {
        return view('frontend.web-dev');
    }
    public function netService()
    {
        return view('frontend.net-service');
    }
    public function seo()
    {
        return view('frontend.seo');
    }
    public function appOtimizaition()
    {
        return view('frontend.app-otimizaition');
    }
    public function case()
    {
        return view('frontend.case');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    public function itSolution()
    {
        return view('frontend.it-solution');
    }
}
