<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservasController extends Controller
{
    public function reservar(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'nombre_usuario' => 'required|string',
            'id_clase' => 'required|integer'
        ]);

        $reserva = Reserva::create([
            'id_usuario'=> $request->id_usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'id_clase' => $request->id_clase,
            'estado' => 'confirmada',
            'metodo_pago' => $request->metodo_pago ?? null
        ]);

        return response()->json($reserva, 201);
    }

    public function cancelar($id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $reserva->estado = 'cancelada';
        $reserva->save();

        return response()->json(['message' => 'Reserva cancelada correctamente']);
    }

    public function reservasPorUsuario($id_usuario)
    {
        $reservas = Reserva::where('id_usuario', $id_usuario)->get();
        return response()->json($reservas);
    }

    public function reservasPorClase($id_clase)
{
    $reservas = Reserva::where('id_clase', $id_clase)
                       ->where('estado', 'confirmada')
                       ->get();
    return response()->json([
        'id_clase' => $id_clase,
        'total_reservas' => $reservas->count(),
        'reservas' => $reservas
    ]);
}

}
