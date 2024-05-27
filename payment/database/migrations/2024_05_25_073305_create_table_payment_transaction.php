<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePaymentTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->string('order_id');
            $table->decimal('amount',19,2);
            $table->enum('category',['deposit','withdraw']);
            $table->enum('status',['success','failed']);
            $table->timestamp('transaction_date');
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
        Schema::dropIfExists('payment_transaction');
    }
}
