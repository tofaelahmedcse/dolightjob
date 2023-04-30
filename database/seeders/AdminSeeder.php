<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_admin = new Admin();
        $new_admin->name = "admin";
        $new_admin->email = "admin@amin.com";
        $new_admin->phone_number = "12345678";
        $new_admin->password = Hash::make('12345678');
        $new_admin->save();
    }
}
