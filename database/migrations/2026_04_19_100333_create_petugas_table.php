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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('pendapatan_id')->constrained('pendapatans')->cascadeOnDelete();
            $table->string('nama_tim', 100);
            $table->string('nama_ketua');
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('alamat');
            $table->enum('status', ['acctive', 'inacctive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
