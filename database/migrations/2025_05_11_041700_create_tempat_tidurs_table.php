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
        Schema::create('tempat_tidurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')->constrained()->onDelete('cascade');
            $table->string('kode_tt'); // ex: TT-01
            $table->enum('status', ['kosong', 'terisi', 'sterilisasi'])->default('kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_tidurs');
    }
};
