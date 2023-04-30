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
        Schema::create('region_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name')->nullable();
            $table->string('sort_name')->nullable();
            $table->string('sort_name_alp')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('int_region')->nullable();
            $table->string('region_code')->nullable();
            $table->string('sub_region_code')->nullable();
            $table->string('int_region_code')->nullable();
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
        Schema::dropIfExists('region_countries');
    }
};
