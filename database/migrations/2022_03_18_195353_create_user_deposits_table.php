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
        Schema::create('user_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->string('transaction_id')->nullable();
            $table->foreignId('gateway_id')->nullable()->default(0)->references('id')->on('gateways')->onDelete('set null');
            $table->double('amount',8,2)->nullable();
            $table->double('usd_rate',8,2)->nullable();
            $table->double('total_usd',8,2)->nullable();
            $table->string('sender_number')->nullable();
            $table->string('transaction_number')->nullable();
            $table->integer('status')->nullable();
            $table->text('deposit_comment')->nullable();
            $table->timestamps();

            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_deposits');
    }
};
