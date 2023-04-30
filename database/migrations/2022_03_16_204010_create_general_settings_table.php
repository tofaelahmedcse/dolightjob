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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_address')->nullable();
            $table->integer('is_under_main')->nullable();
            $table->double('usd_rate',8,2)->nullable();
            $table->double('service_charge',8,2)->nullable();
            $table->integer('job_auto_post')->nullable();
            $table->integer('auto_post_date')->nullable();
            $table->double('job_post_min_amt',8,2)->nullable();
            $table->double('screenshot_price',8,2)->nullable();
            $table->string('site_currency')->nullable();
            $table->double('welcome_balance',8,2)->nullable();
            $table->text('default_job_msg')->nullable();
            $table->text('default_dep_msg')->nullable();
            $table->text('default_with_msg')->nullable();
            $table->text('das_noti_msg')->nullable();
            $table->text('dep_noti_msg')->nullable();
            $table->text('with_noti_msg')->nullable();
            $table->text('with_ser_charge')->nullable();
            $table->text('job_unsatis_limit')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
};
