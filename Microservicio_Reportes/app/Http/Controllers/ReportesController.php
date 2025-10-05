<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\ReservasExport;

class ReportesController extends Controller
{

    public function generarPDF($id_clase)
    {
        $reservas = Reserva::where('id_clase', $id_clase)->get();

        if ($reservas->isEmpty()) {
            return response()->json(['message' => 'No hay reservas para esta clase'], 404);
        }

        $pdf = Pdf::loadView('reportes.reservas_clasePDF', compact('reservas', 'id_clase'));

        return $pdf->download("reservas_clase_{$id_clase}.pdf");
    }

    public function generarExcel()
    {
        $nombreArchivo = 'todas_las_reservas.xlsx';
        return Excel::download(new ReservasExport, $nombreArchivo);
    }
}
