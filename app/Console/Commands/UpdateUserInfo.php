<?php

namespace App\Console\Commands;

use App\Mail\AccActiveEmail;
use App\Mail\AfterAccVerMail;
use App\Models\all_job;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Faker\Factory as Faker;
class UpdateUserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//        $users = User::where('password', null)->orWhere('password', '')->get();
//        foreach ($users as $user) {
//            $sing_user = User::where('id', $user->id)->first();
//            $sing_user->password = Hash::make('12345678');
//            $sing_user->ver_link = null;
//            $sing_user->save();
//        }


//        $users = User::where('account_status', null)->orWhere('account_status', '')->get();
//        foreach ($users as $user){
//            $sing_user = User::where('id',$user->id)->first();
//            $sing_user->account_status = 2 ;
//            $sing_user->save();
//            $to = $sing_user->email;
//            $msg = [
//                'name' => $sing_user->name,
//            ];
////            Mail::to($to)->send(new AfterAccVerMail($msg));
//
//        }


        $all_jobs = DB::table('all_jobs')->get();
        foreach ($all_jobs as $job){
            $sing_job = all_job::where('id',$job->id)->first();
            if ($sing_job){
                $sing_job->job_title = "Subscribe the Channel";
                $sing_job->save();
            }
        }



    }
}
