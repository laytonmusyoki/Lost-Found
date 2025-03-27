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
        Schema::create('claimers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('lost_founds')->onDelete('cascade');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claimers');
    }
};
