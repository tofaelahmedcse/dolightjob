<?php

namespace App\Http\Controllers;

use App\Models\all_job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class TestController extends Controller
{
    public function test()
    {
//        for ($i=0;$i<50000;$i++){
//            $faker = Faker::create();
//            $new_job = new all_job();
//            $new_job->user_id = rand(1,9879);
//            $new_job->job_id = rand(1,9879);
//            $new_job->region_name = 'Asia';
//            $new_job->main_category = 1;
//            $new_job->sub_category = 1;
//            $new_job->job_title = $faker->paragraph;
//            $new_job->relative_file = null;
//            $new_job->specific_task = 'Search on YouTube: Get prosperity Now. Search on YouTube: Get prosperity Now. Search on YouTube: Get prosperity Now. ';
//            $new_job->require_proof = 'Submit your Mail as a proof';
//            $new_job->thumbnail = 'assets/dashboard/images/jobthumbnail/97021658599668.png';
//            $new_job->worker_need = 58;
//            $new_job->each_worker_earn = 0.02;
//            $new_job->screenshot = 2;
//            $new_job->est_day = 7;
//            $new_job->est_job_cost = 1.58;
//            $new_job->admin_income = 0.2;
//            $new_job->job_status = 2;
//            $new_job->save();
//        }




    }
}
