<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre'=>'Frank Rivas',
            'codigo'=>'FR001',
            'direccion'=>'Managua',
            'telefono'=>'8899-5529',
            'estado'=>'Activo',

        ]);

        DB::table('clientes')->insert([
            'nombre'=>'Tania Dominint',
            'codigo'=>'TD002',
            'direccion'=>'Terminal 120',
            'telefono'=>'8789-2520',
            'estado'=>'Activo',
        ]);

        DB::table('clientes')->insert([
            'nombre'=>'Fulanito Martinez',
            'codigo'=>'FM003',
            'direccion'=>'Terminal 112',
            'telefono'=>'8888-2550',
            'estado'=>'Inactivo',
        ]);

        DB::table('clientes')->insert([
            'nombre'=>'Jeff Dominguez',
            'codigo'=>'JD004',
            'direccion'=>'Villa Dignidad2',
            'telefono'=>'8888-1230',
            'estado'=>'Activo',
        ]);

        DB::table('clientes')->insert([
            'nombre'=>'Doribel Sandoval',
            'codigo'=>'DS005',
            'direccion'=>'Villa Esperanza',
            'telefono'=>'8999-1230',
            'estado'=>'Activo',
        ]);

        DB::table('clientes')->insert([
            'nombre'=>'Martín Andresson',
            'codigo'=>'MA006',
            'direccion'=>'Masaya',
            'telefono'=>'5698-2550',
            'estado'=>'Inactivo',
        ]);
    }
}
