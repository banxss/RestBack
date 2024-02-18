<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nombre de la tabla en la base de datos // protected se utiliza para que solo puedan acceder y modificar las propiedades de este modelo las clases derivadas
    
    //$fillable: Especifica qué campos del modelo se pueden rellenar mediante asignación masiva
    protected $fillable = ['fecha', 'Asunto', 'Mensaje','Comensales'];

    // Desactivar marcas de tiempo
    public $timestamps = false;


    public function user()
    {
        return $this->belongTo(User::class);
    }
}

