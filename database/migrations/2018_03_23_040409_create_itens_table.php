<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->uuid('id')->nullable(false);
            $table->string('product_id', 10)->nullable(false);
            $table->integer('order_id')->nullable(false);
            $table->double('amount')->nullable(false);
            $table->double('productPrice')->nullable(false);
            $table->double('discount')->nullable(false);
            $table->double('total')->nullable(false);
            $table->timestamps();

            $table->unique('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens');
    }
}
