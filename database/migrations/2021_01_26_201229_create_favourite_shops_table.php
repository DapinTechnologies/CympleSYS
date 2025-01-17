<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('business_data')->onDelete('cascade');
            $table->integer('phone_no');
            $table->json('location')->default(new Expression('(JSON_ARRAY())'))->nullable;
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
        Schema::dropIfExists('favourite_shops');
    }
}
