<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Desactivar la validación de claves foráneas temporalmente si es necesario
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        DB::table('reservas')->insert([
            // Inicio de los 20 registros proporcionados
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Beto Lopez',
                'id_clase' => 2,
                'estado' => 'Pendiente',
                'metodo_pago' => 'Efectivo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 11,
                'nombre_usuario' => 'Carla Ruiz',
                'id_clase' => 3,
                'estado' => 'Cancelada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 5,
                'nombre_usuario' => 'Ana Garcia',
                'id_clase' => 1,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 15,
                'nombre_usuario' => 'David Soto',
                'id_clase' => 4,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 1,
                'nombre_usuario' => 'Elena Mora',
                'id_clase' => 2,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Efectivo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Beto Lopez',
                'id_clase' => 5,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 12,
                'nombre_usuario' => 'Fran Torres',
                'id_clase' => 1,
                'estado' => 'Pendiente',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 11,
                'nombre_usuario' => 'Carla Ruiz',
                'id_clase' => 3,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 15,
                'nombre_usuario' => 'David Soto',
                'id_clase' => 6,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Efectivo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Gaby Vera',
                'id_clase' => 4,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 5,
                'nombre_usuario' => 'Ana Garcia',
                'id_clase' => 7,
                'estado' => 'Pendiente',
                'metodo_pago' => 'Efectivo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 1,
                'nombre_usuario' => 'Elena Mora',
                'id_clase' => 2,
                'estado' => 'Cancelada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 22,
                'nombre_usuario' => 'Hugo Marin',
                'id_clase' => 3,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Beto Lopez',
                'id_clase' => 8,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 10,
                'nombre_usuario' => 'Irma Rios',
                'id_clase' => 1,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 5,
                'nombre_usuario' => 'Ana Garcia',
                'id_clase' => 4,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Efectivo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 11,
                'nombre_usuario' => 'Carla Ruiz',
                'id_clase' => 9,
                'estado' => 'Pendiente',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 12,
                'nombre_usuario' => 'Fran Torres',
                'id_clase' => 2,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Transferencia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Gaby Vera',
                'id_clase' => 10,
                'estado' => 'Confirmada',
                'metodo_pago' => 'Tarjeta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Fin de los 20 registros
        ]);
    }
}