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
        Schema::create('user_transfer_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->foreignId('receiver_id')->nullable()->default(0)->references('id')->on('users')->onDelete('set null');
            $table->double('transfer_amount',8,2)->nullable();
            $table->timestamp('transfer_date')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->index(['user_id','receiver_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_transfer_balances');
    }
};
