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
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id')->unsigned();
            $table->unsignedBigInteger('medicine_id');
            $table->integer('quantity');
            $table->date('purchase_date')->default(now());
            $table->timestamps();

            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
