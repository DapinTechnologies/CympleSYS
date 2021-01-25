<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Schema;

class CreateBusinessdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessdata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->string('business_mode')->nullable();
            $table->string('business_type')->nullable();
            $table->string('products_type')->nullable();
            $table->string('business_reg_no')->nullable();
            $table->string('category')->nullable();
            $table->string('building_name')->nullable();
            $table->string('place_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('county')->nullable();
            $table->json('gps_data')->default(new Expression('(JSON_ARRAY())'))->nullable;
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
        Schema::dropIfExists('businessdata');
    }
}
