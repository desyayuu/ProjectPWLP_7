<?php

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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('email',30)->after('no_handphone')->nullable();
            $table->date('tanggal_lahir')->after('nama')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::column('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('email',30);
            $table->dropColumn('tanggal_lahir');
            
        });
    }
};
