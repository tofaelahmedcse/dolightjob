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
        Schema::create('all_job_countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('job_id')->nullable()->default(0)->references('id')->on('all_jobs')->onDelete('set null');
            $table->foreignId('country_id')->nullable()->default(0)->references('id')->on('region_countries')->onDelete('set null');
            $table->string('country_name')->nullable();
            $table->timestamps();

            $table->index(['user_id','job_id','country_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_job_countries');
    }
};
