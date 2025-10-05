<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Reservas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #555; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Reservas - Clase ID: {{ $id_clase }}</h2>
    <table>
        <thead>
            <tr>
                <th>ID Reserva</th>
                <th>Usuario</th>
                <th>Método de Pago</th>
                <th>Estado</th>
                <th>Fecha de Reserva</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->nombre_usuario }}</td>
                    <td>{{ $reserva->metodo_pago ?? 'No especificado' }}</td>
                    <td>{{ ucfirst($reserva->estado) }}</td>
                    <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
