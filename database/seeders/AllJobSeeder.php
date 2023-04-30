<?php

namespace Database\Seeders;

use App\Models\all_job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AllJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 200) as $index) {
            $check_job = all_job::select('id')->orderBy('id', 'desc')->count();
            $job_count = $check_job + 1;

            if ($job_count < 10) {
                $job_id = '0000' . $job_count;
            } elseif ($job_count >= 10 && $job_count <= 99) {
                $job_id = '000' . $job_count;
            } elseif ($job_count >= 100 && $job_count <= 999) {
                $job_id = '00' . $job_count;
            } elseif ($job_count >= 1000 && $job_count <= 9999) {
                $job_id = '0' . $job_count;
            } else {
                $job_id = $job_count;
            }
            $job = new all_job();
            $job->user_id = rand(9736, 13292);
            $job->job_id = $job_id;
            $job->region_name = "Asia";
            $job->main_category = 2;
            $job->sub_category = 2;
            $job->job_title = $faker->jobTitle;
            $job->specific_task = $faker->paragraph;
            $job->require_proof = $faker->paragraph;
            $job->thumbnail = "assets/dashboard/images/jobthumbnail/11647631620.png";
            $job->worker_need = 7;
            $job->each_worker_earn = 1.25;
            $job->screenshot = 2;
            $job->est_day = 7;
            $job->est_job_cost = (7 * 1.25);
            $job->job_status = 2;
            $job->admin_income = 2;
            $job->save();
        }
    }
}
