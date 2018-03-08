<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->string('nombre', 100);
            $table->string('apellidos',100);
            $table->string('nif');
            $table->string('direccion',255);
            $table->string('codigopostal');
            $table->string('localidad', 100);
            $table->string('provincia',100);
            $table->date('fechanacimiento');
            $table->string('telefono1',50);
            $table->string('telefono2',50);
            $table->string('movil');
            $table->string('email',100);
            $table->string('iban',100);
            $table->text('nota');
            $table->uuid('user');
            $table->foreign('user')->references('id')->on('users');

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
        Schema::dropIfExists('clients');
    }
}
