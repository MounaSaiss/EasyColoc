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
        Schema::create('dettes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('payer_id');
            $table->integer('receiver_id');
            $table->decimal('montant');
            $table->dateTime('paidAt');
            $table->enum('status', ['pending','clearde']);
            $table->boolean('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dettes');
    }
};
