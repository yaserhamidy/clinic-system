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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id')->id()->unsigned();
            $table->integer('amount');
            $table->date('date');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('account_id')->on('accounts')->onDelete('cascade'); // Optional foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
