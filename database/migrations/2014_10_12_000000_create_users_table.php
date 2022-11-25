<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('NIM')->unique();
            $table->string('jurusan');
            $table->string('asal');
            $table->string('name');
            $table->string('username', 15)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nohp')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'magang'])->default('magang');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('kehadiran')->default(0);
            $table->integer('kedisiplinan')->default(0);
            $table->integer('tanggungjawab')->default(0);
            $table->integer('ketekunan')->default(0);
            $table->integer('sopansantun')->default(0);
            $table->integer('kreatifitas')->default(0);
            $table->integer('inovatif')->default(0);
            $table->integer('dayajuang')->default(0);
            $table->integer('percayadiri')->default(0);
            $table->integer('kerjasama')->default(0);
            $table->integer('hubungansosial')->default(0);
            $table->integer('adaptasi')->default(0);
            $table->integer('persiapankerja')->default(0);
            $table->integer('pelaksanaankerja')->default(0);
            $table->integer('hasilkerja')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     * nambah nomor induk / NIM /NIS
     * jurusan di sekolah / kampus
     * Nomor HP
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
