<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
   
    public function definition(): array
    {
        
     
        
        return [
            
            'Fecha' => fake()->date(),
            'Asunto'=> fake()->text(14),
            'Mensaje'=> fake()->text(120),
            'user_id'=>User::factory(),
            
            
            
        ];
    }
}
