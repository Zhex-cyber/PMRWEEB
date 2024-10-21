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
            $table->string('name');
            $table->string('username')->unique();
            // Mengganti email dengan NIS
            $table->integer('nis')->unique(); // Menggunakan NIS sebagai pengganti email
            $table->enum('role', ['Admin', 'Anggota', 'Guest']);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('foto_profile')->nullable();
            $table->timestamp('nis_verified_at')->nullable(); // Optional: seperti 'email_verified_at' untuk verifikasi NIS
            $table->string('password');
            $table->rememberToken();
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
}
