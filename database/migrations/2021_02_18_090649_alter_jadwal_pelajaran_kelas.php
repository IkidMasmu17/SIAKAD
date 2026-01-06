<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterJadwalPelajaranKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_pelajarans', function (Blueprint $table) {
            if (!Schema::hasColumn('jadwal_pelajarans', 'kelas_id')) {
                DB::table('jadwal_pelajarans')->truncate();
                $table->unsignedBigInteger('kelas_id');
            }
            if (Schema::hasColumn('jadwal_pelajarans', 'kelas')) {
                $table->dropColumn('kelas');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
