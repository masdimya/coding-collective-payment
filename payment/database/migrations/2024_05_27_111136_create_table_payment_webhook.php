<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePaymentWebhook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_webhook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->string('url');
            $table->timestamps();

            $table->foreign('cust_id')->references('id')->on('payment_customer')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_webhook');
    }
}
