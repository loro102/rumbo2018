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
            $table->string('direccion',255)->nullable();
            $table->string('codigopostal')->nullable();
            $table->string('localidad', 100)->nullable();
            $table->string('provincia',100)->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('telefono1',50)->nullable();
            $table->string('telefono2',50)->nullable();
            $table->string('movil')->nullable();
            $table->string('email',100)->nullable();
            $table->string('iban',100)->nullable();
            $table->text('nota')->nullable();
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
