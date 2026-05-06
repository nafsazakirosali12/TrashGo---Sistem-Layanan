<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masyarakat_id')->constrained('masyarakats')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->enum('metode_pembayaran', ['cod', 'transfer']);
            $table->boolean('pakai_point')->default(false);
            $table->integer('point_digunakan')->default(0);
            $table->integer('total_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};