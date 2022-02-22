<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string("phone")->nullable();
            $table->string("location")->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->integer('no_of_properties')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
