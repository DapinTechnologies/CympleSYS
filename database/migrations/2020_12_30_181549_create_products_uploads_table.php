<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->string('product_type');
            $table->string('price');
            $table->string('charge');
            $table->string('charge_type');
            $table->string('images');
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
        Schema::dropIfExists('products_uploads');
    }
}
