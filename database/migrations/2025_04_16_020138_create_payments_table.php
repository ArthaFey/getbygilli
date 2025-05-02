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
            $table->string('order_id')->unique();
            $table->string('snap_token');
            $table->string('tiket');
            $table->string('from');
            $table->string('to');
            $table->string('operator');
            $table->string('class');
            $table->string('hotline');
            $table->string('gmaps');
            $table->string('tanggal_keberangkatan');
            $table->string('tanggal_tiba');
            $table->string('jumlah_tiket_dewasa');
            $table->string('jumlah_tiket_anak_anak');
            $table->string('total_harga');
            $table->string('no_telp');
            $table->string('email');
            $table->string('name');
            $table->string('tanggal_lahir');
            $table->string('gender');
            $table->string('passport_no');
            $table->string('passport_expiry');
            $table->string('passport_issue');
            $table->string('nationality');
            $table->string('baggage');
            $table->string('is_read')->default(false);
            $table->string('status')->default('pending');
            $table->timestamps();
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
