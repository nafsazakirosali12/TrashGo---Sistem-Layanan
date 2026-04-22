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
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_masyarakat', 100);
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki']);
            $table->longText('alamat')->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->integer('no_telepon')->nullable();
            $table->string('foto_masyarakat', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakats');
    }
};
