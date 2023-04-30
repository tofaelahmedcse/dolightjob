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
        Schema::create('job_applies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('job_id')->nullable()->default(0)->references('id')->on('all_jobs')->onDelete('set null');
            $table->string('task_name')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->text('answer')->nullable();
            $table->text('prove_one')->nullable();
            $table->text('prove_two')->nullable();
            $table->integer('is_submit')->nullable();
            $table->integer('is_sat')->nullable();
            $table->integer('status')->nullable();
            $table->timestamp('auto_approve_date')->nullable();
            $table->text('un_satic_comment')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamp('submi_end_date')->nullable();
            $table->timestamps();

            $table->index(['user_id','job_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applies');
    }
};
