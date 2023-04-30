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
        Schema::create('job_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('region_name')->nullable();
            $table->integer('country_id')->nullable();
            $table->foreignId('main_cat_id')->nullable()->default(0)->references('id')->on('job_main_categories')->onDelete('set null');
            $table->string('category_name')->nullable();
            $table->decimal('category_price',8,2)->nullable();
            $table->timestamps();

            $table->index(['main_cat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_sub_categories');
    }
};
