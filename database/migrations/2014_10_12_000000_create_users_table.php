<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('device_name');
            $table->string('account_type');
            $table->string('auth_type');
            $table->string('push_token');
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
            $table->decimal('gps_data', $precision = 8, $scale = 2)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
