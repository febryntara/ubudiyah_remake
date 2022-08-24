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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //umum
            $table->string('email')->unique(); //umum
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //umum
            $table->integer('role_id'); //umum
            $table->string('status_akun')->default('tidak_aktif'); //umum
            $table->rememberToken();
            $table->integer('umur'); //umum
            $table->date('tanggal_lahir'); //umum
            $table->string('tempat_lahir'); //umum
            $table->string('nip')->nullable(); //guru
            $table->string('nik')->nullable(); //umum
            $table->string('nis')->nullable(); //siswa
            $table->string('nisn')->nullable(); //siswa
            $table->string('cita_cita')->nullable(); //siswa
            $table->integer('jenis_kelamin'); //umum
            $table->integer('kelas')->nullable(); //siswa
            $table->string('agama')->nullable(); //umum
            $table->integer('status_kawin')->default(0); //umum
            $table->string('kelurahan')->nullable(); //umum
            $table->string('alamat')->nullable(); //umum
            $table->string('kontak')->nullable(); //umum
            $table->text('moto_hidup')->nullable(); //siswa & guru
            $table->integer('mapel_id')->nullable(); //guru
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
        Schema::dropIfExists('users');
    }
};
