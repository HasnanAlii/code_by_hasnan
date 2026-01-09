<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->integer('jumlah');
            $table->text('keterangan')->nullable();

            $table->foreignId('id_pengeluaran')
                ->nullable()
                ->constrained('pengeluarans')
                ->nullOnDelete();

            $table->foreignId('id_projek')
                ->nullable()
                ->constrained('projeks')
                ->nullOnDelete();
            $table->integer('saldo_akhir')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
