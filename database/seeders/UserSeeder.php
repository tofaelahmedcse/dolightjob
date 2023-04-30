<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
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
            $user = new User();
            $user->user_ref_id = rand(0000000, 9999999);
            $user->balance = rand(0000, 4444);
            $user->earning_bal = rand(0000, 4444);
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->phone_number = $faker->phoneNumber;
            $user->password = Hash::make('12345678');
            $user->joining_date = Carbon::now()->format('Y-m-d');
            $user->account_status = 2;
            $user->save();
        }
    }
}
