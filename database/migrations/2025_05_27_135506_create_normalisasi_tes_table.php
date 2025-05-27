<?php

use App\Models\KriteriaTes;
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
        Schema::create('normalisasi_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class)->constrained('siswa')->cascadeOnDelete();
            $table->foreignIdFor(KriteriaTes::class)->constrained('kriteria_tes')->cascadeOnDelete();
            $table->decimal('nilai_normalisasi_tes', 10, 2);
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
        Schema::dropIfExists('normalisasi_tes');
    }
};
