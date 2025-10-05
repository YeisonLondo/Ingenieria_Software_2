<?php

namespace App\Exports;

use App\Models\Reserva;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Reserva::select('id', 'id_usuario', 'nombre_usuario', 'id_clase', 'estado', 'metodo_pago', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID Usuario',
            'Nombre Usuario',
            'ID Clase',
            'Estado',
            'Método de Pago',
            'Fecha de Creación',
        ];
    }
}
