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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->string('transaction_id')->nullable();
            $table->integer('withdraw_type')->nullable();
            $table->double('amount',8,2)->nullable();
            $table->double('usd_rate',8,2)->nullable();
            $table->double('total_usd',8,2)->nullable();
            $table->double('user_will_get',8,2)->nullable();
            $table->string('receiver_number')->nullable();
            $table->integer('status')->nullable();
            $table->text('with_comment')->nullable();
            $table->double('admin_income',8,2)->nullable();
            $table->timestamps();

            $table->index(['user_id','withdraw_type','status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
};
