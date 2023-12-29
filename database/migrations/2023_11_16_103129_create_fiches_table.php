<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->integer('semestre');
            $table->date('date');
            $table->string('codeCours');
            $table->string('enseignant');
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->string('totalHeures')->default('');
            $table->string('salle');
            $table->string('typeSeance');
            $table->string('titreSeance');
            $table->text('contenu');
            $table->text('signatureDelegue')->nullable();
            $table->text('signatureProf')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiches');
    }
}
