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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('masyarakat_id')->constrained('masyarakats')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('point_id')->constrained('points')->cascadeOnDelete();
            $table->enum('status', ['succesed', 'failed']);
            $table->string('bukti_pembayaran');
            $table->integer('total_pembayaran');
            $table->dateTime('tanggal_pembayaran');
            $table->enum('metode_pembayaran', ['cod', 'transfer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
