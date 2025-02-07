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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('merchant_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('status');
            $table->string('amount');
            $table->string('amount_paid');
            $table->string('sign');
            $table->integer('limit');
            $table->string('provider');
            $table->integer('project')->nullable();
            $table->integer('invoice')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
