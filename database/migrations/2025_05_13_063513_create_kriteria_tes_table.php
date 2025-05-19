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
        Schema::create('kriteria_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class)->constrained('siswa')->cascadeOnDelete();
            $table->string('nama_kriteria_tes');
            $table->string('tipe_kriteria_tes');
            $table->float('bobot_kriteria_tes', 8, 2);
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
        Schema::dropIfExists('kriteria_tes');
    }
};
