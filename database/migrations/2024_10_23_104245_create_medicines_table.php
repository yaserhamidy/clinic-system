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
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('medicine_id')->id()->unsigned();
            $table->string('medicine_name' , 64);
            $table->integer('amount');
            $table->string('description' , 256)->nullable();
            $table->date('date');
            $table->unsignedBigInteger('medicineCat_id')->nullable();
            $table->foreign('medicineCat_id')->references('medicineCat_id')->on('medicine_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
