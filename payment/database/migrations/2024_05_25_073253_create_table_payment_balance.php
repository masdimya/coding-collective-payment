<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePaymentBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_balance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->decimal('balance',19,2);
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
        Schema::dropIfExists('payment_balance');
    }
}
