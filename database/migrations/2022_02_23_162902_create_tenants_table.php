<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->unsigned()->index()->nullable();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->bigInteger('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->bigInteger('unit_id')->unsigned()->index()->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('id_number');
            $table->string('phone');
            $table->decimal('rent', 60, 2);
            $table->decimal('deposit', 60, 2);
            $table->string('due_date')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
