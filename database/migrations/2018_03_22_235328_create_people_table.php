<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->uuid('id')->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->string('cpf', 15)->nullable(false);
            $table->date('birthDate')->nullable(false);
            $table->timestamps();

            $table->unique('id');
            $table->unique('name');

            $table->primary('cpf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
