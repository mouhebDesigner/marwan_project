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
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('email')->unique();
            $table->biginteger('numtel')->unique();
            $table->string('formation')->nullable();
            $table->string('specialite')->nullable();
            $table->string('adresse')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->biginteger('cin')->unique()->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'formateur', 'eleve']);
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
