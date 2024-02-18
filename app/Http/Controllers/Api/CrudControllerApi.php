<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Reserva;
use App\Models\ReservaNoRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class CrudControllerApi extends Controller
{



    public function mostrarTODOSDatos(Request $request)
{
    try {
        $reservas = Reserva::all(); // Obtener todas las reservas sin filtrar por usuario
        return response()->json($reservas);
    } catch (\Throwable $th) {
        // Capturar cualquier excepción ocurrida y devolver una respuesta JSON de error
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}
    public function mostrarDatos(Request $request)
    {
        $user_id = $request->user()->id;
        try {

            $reservas = Reserva::where('user_id', $user_id)->get();
            return response()->json($reservas);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida y devolver una respuesta JSON de error
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function insertarDatos(Request $request)
    {
        try {
            // Obtenemos el usuario autenticado
            $user = Auth::user();

            // Verificamos si el usuario no está autenticado
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario no autenticado',
                ], 401);
            }

            // Obtenemos el correo electrónico del usuario autenticado
            $email = $user->email;

            // Creamos una nueva instancia de la clase Reserva
            $reserva = new Reserva();

            // Establecemos valores para los campos de la reserva
            $reserva->fecha = $request->fecha;
            $reserva->User_id = $user->id;
         
            $reserva->Asunto = $request->asunto;
            $reserva->Mensaje = $request->mensaje;
            $reserva->Comensales = $request->comensales;

            // Guardamos la reserva en la base de datos
            $reserva->save();

            // Devolvemos una respuesta JSON para confirmar que se ha guardado correctamente
            return response()->json([
                'status' => true,
                'message' => 'Reserva realizada correctamente',
            ], 200);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida y devolver una respuesta JSON de error
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function borrarDatos(Request $request)
    {
        try {
            // Obtenemos el usuario autenticado
            $user = Auth::user();

            // Verificamos si el usuario no está autenticado
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuario no autenticado',
                ], 401);
            }

            // Elimina la reserva con el ID proporcionado y que pertenezca al usuario autenticado
            Reserva::where('id', $request->id)
                ->where('user_id', $user->id)
                ->delete();

            // Devuelve una respuesta JSON exitosa
            return response()->json([
                'status' => true,
                'message' => 'Reserva eliminada correctamente',
            ], 200);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida y devolver una respuesta JSON de error
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function insertarDatosNoregistrado(Request $request)
    {
        try {
            // Obtenemos el usuario autenticado
        

            // Obtenemos el correo electrónico del usuario autenticado
         

            // Creamos una nueva instancia de la clase Reserva
            $reserva = new ReservaNoRegister;

            // Establecemos valores para los campos de la reserva
            $reserva->fecha = $request->fecha;
            $reserva->Cliente = $request->Cliente;
            $reserva->Email = $request->Email;
            $reserva->Asunto = $request->asunto;
            $reserva->Mensaje = $request->mensaje;
            $reserva->Comensales = $request->comensales;

            // Guardamos la reserva en la base de datos
            $reserva->save();

            // Devolvemos una respuesta JSON para confirmar que se ha guardado correctamente
            return response()->json([
                'status' => true,
                'message' => 'Reserva realizada correctamente',
            ], 200);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida y devolver una respuesta JSON de error
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
