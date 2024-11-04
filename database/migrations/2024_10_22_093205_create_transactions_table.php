<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
          Schema::create('transactions', function (Blueprint $table) {
        $table->bigIncrements('transaction_id')->id()->unsigned();
        $table->decimal('amount', 10, 2); // Amount of the transaction
        // Optional: Foreign keys
        $table->unsignedBigInteger('account_id')->nullable();
        $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade');
        $table->date('date');
        $table->unsignedBigInteger('payment_id')->nullable();
        $table->foreign('payment_id')->references('payment_id')->on('payments')->onDelete('cascade');
        $table->timestamps(); // Created and updated timestamps
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
