<?php

use App\Models\Siswa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_seleksi_prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class)->constrained('siswa')->cascadeOnDelete();
            $table->decimal('nilai_akhir_prestasi', 10,2);
            $table->string('ranking');
            // $table->enum('status_prestasi', ['Lulus', 'Tidak lulus'])->default('Tidak lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_seleksi_prestasi');
    }
};
