<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->nullable(false);
            $table->string('productCode', 10)->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->double('price')->nullable(false);
            $table->timestamps();

            $table->unique('id');
            $table->unique('productCode');
            $table->unique('name');

            $table->primary('productCode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
