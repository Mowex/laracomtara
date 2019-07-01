<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarantulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarantulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('common_name');
            $table->string('scientific_name');
            $table->float('size', 3, 1);
            $table->integer('price');
            $table->string('gender');
            $table->string('classification');
            $table->string('image_url');
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
        Schema::dropIfExists('tarantulas');
    }
}
