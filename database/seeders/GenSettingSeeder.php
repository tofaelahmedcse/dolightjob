<?php

namespace Database\Seeders;

use App\Models\general_setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gen = new general_setting();
        $gen->site_name = "Do Light Job";
        $gen->site_email = "dolightjob@gmail.com";
        $gen->site_phone = "01784888730";
        $gen->welcome_balance = 0.03;
        $gen->site_address = "Gurudaspur, Natore, Rajshahi.  6440";
        $gen->is_under_main = 2;
        $gen->usd_rate =100.00;
        $gen->service_charge = 10.00;
        $gen->job_auto_post = 2;
        $gen->auto_post_date = 1;
        $gen->job_post_min_amt = 0.8;
        $gen->screenshot_price = 0.5;
        $gen->site_currency = "USD";
        $gen->default_job_msg = "Your Job is approved. Thanks for posting the job.";
        $gen->default_dep_msg = "Congratulations!
Your Deposit has been approved.
Thanks for the deposit to the Dolight job.
Thank You.";
        $gen->default_with_msg = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";
        $gen->das_noti_msg = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";
        $gen->dep_noti_msg = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";
        $gen->with_noti_msg = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";
        $gen->with_ser_charge = 10;
        $gen->job_unsatis_limit = 20;
        $gen->save();
    }
}
