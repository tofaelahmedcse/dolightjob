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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('dep_id')->nullable()->default(0)->references('id')->on('user_deposits')->onDelete('set null');
            $table->foreignId('with_id')->nullable()->default(0)->references('id')->on('withdraws')->onDelete('set null');
            $table->string('transaction_id')->nullable();
            $table->string('transaction_name')->nullable();
            $table->double('amount',8,2)->nullable();
            $table->double('total_usd',8,2)->nullable();
            $table->integer('status')->nullable();
            $table->integer('type')->nullable();
            $table->double('admin_income',8,2)->nullable();
            $table->timestamps();

            $table->index(['user_id','dep_id','with_id','status','type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
