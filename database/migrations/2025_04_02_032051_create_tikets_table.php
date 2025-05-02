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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id');
            $table->string('category_id');
            $table->string('foto');
            $table->string('judul_tiket');
            $table->string('from');
            $table->string('to');
            $table->string('class');
            $table->string('hotline');
            $table->string('gmaps');
            $table->date('tanggal_keberangkatan');
            $table->string('slug')->unique();
            $table->integer('harga_dewasa');
            $table->integer('harga_anak_anak');
            $table->text('keterangan_tiba');
            $table->text('note');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
