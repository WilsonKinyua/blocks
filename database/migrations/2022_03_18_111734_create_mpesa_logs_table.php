<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_logs', function (Blueprint $table) {
            $table->id();

            $table->json('payload')->nullable();
            $table->string('status')->nullable();

            $table->string('trans_id');
            $table->string('trans_time');
            $table->string('transaction_type');
            $table->unsignedDecimal('trans_amount', 19, 2)->default(0);
            $table->unsignedDecimal('org_account_balance', 19, 2)->nullable();

            $table->string('business_short_code')->nullable();
            $table->string('bill_ref_number')->nullable();
            $table->string('invoice_number')->nullable();

            $table->string('msisdn');
            $table->string('last_name', 255);
            $table->string('first_name', 255);
            $table->string('middle_name', 255)->nullable();

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
        Schema::dropIfExists('mpesa_logs');
    }
};
