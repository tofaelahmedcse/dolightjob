<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_member_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('applied_user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('apply_id')->nullable()->default(0)->references('id')->on('job_applies')->onDelete('set null');
            $table->foreignId('job_id')->nullable()->default(0)->references('id')->on('all_jobs')->onDelete('set null');
            $table->text('report_desc')->nullable();
            $table->integer('is_review')->nullable();
            $table->timestamps();

            $table->index(['user_id','apply_id','job_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_member_reports');
    }
};
