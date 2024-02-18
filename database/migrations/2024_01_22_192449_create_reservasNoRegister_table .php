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
    {   //protected $fillable = ['fecha', 'Nombre', 'Email', 'Asunto', 'Mensaje'];
        Schema::create('reservasNoRegister', function (Blueprint $table) {
            $table->id();
             
            $table->date('Fecha');
            $table->string('Cliente');
            $table->string('Email');
            $table->string('Asunto');
            $table->string('Mensaje');
            $table->string('Comensales');


           
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasNoRegister');
    }
};
