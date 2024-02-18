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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
             
            $table->date('Fecha');
            
            $table->string('Asunto');
            $table->string('Mensaje');
            $table->string('Comensales');

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
