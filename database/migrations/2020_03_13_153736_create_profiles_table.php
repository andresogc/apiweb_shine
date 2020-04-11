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
            $table->string('estado_sentimental')->nullable();
            $table->integer('estatura')->nullable();
            $table->string('complexion')->nullable();
            $table->string('hijos')->nullable();
            $table->string('idioma')->nullable();
            $table->string('profesion')->nullable();
            $table->enum('alcohol',['Si','No'])->nullable();
            $table->enum('fuma',['Si','No'])->nullable();
            $table->text('hobbie')->nullable();
            $table->enum('practica_deporte',['Si','No'])->nullable();
            $table->string('deporte_favorito')->nullable();
            $table->text('description')->nullable();
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
