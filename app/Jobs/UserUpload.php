<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class UserUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $chuck_data;

    public function __construct($chuck_data)
    {
        $this->chuck_data = $chuck_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->chuck_data as $item) {
            $new_club = new User();
            $new_club->earning_bal = 0.00;
            $new_club->balance = 0.00;
            $new_club->name = isset($item[0]) ? $item[0] : null;
            $new_club->phone_number = '0' . isset($item[1]) ? $item[1] : null;
            $new_club->email = isset($item[2]) ? $item[2] : null;
            $new_club->password = Hash::make('12345678');
            $new_club->account_status = 2;
            $new_club->ver_code = null;
            $new_club->save();
        }
    }
}
