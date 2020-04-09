<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->integer('mobile')->unique();
            $table->string('estado_sentimental');
            $table->integer('estatura');
            $table->string('complexion');
            $table->string('hijos')->nullable();
            $table->string('idioma');
            $table->string('profesion');
            $table->enum('alcohol',['Si','No'])->default('No');
            $table->enum('fuma',['Si','No'])->default('No');
            $table->text('hobbie');
            $table->enum('practica_deporte',['Si','No'])->default('No');
            $table->string('deporte_favorito')->nullabel();
            $table->text('description');
            $table->string('plan',30)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
