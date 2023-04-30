<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_ref_id')->nullable();
            $table->double('balance', 8, 2)->nullable();
            $table->double('earning_bal', 8, 2)->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('joining_date')->nullable();
            $table->string('website')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('description')->nullable();
            $table->integer('account_status')->nullable();
            $table->string('ver_code')->nullable();
            $table->string('ver_link')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
