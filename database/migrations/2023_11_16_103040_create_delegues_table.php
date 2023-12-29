<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delegues', function (Blueprint $table) {
            $table->id();
            $table->string('nomDel');
            $table->string('emailDel');
            $table->string('matDel');
            $table->string('telDel');
            $table->string('mdpDel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegues');
    }
};
