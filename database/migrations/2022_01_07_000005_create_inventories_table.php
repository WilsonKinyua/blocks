<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle');
            $table->string('engine_type');
            $table->string('transmission');
            $table->string('interior_color')->nullable();
            $table->string('exterior_color')->nullable();
            $table->timestamps();
        });
    }
}
