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
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('sell_id')->unsigned(); // Unique identifier for each sell
        $table->unsignedBigInteger('medicine_id'); // Reference to the medicine sold
        $table->integer('quantity'); // Quantity sold
        $table->date('sell_date')->default(now()); // Date of the sell
        $table->timestamps();

        $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
