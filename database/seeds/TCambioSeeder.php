<?php

use Illuminate\Database\Seeder;

class TCambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasac')->insert([
            'monto'=>'34.3086',
            'estado'=>'Activo',
            'created_at'=>'2020/06/19'
        ]);

        DB::table('tasac')->insert([
            'monto'=>'34.32',
            'estado'=>'Activo',
            'created_at'=>'2020/06/12'
        ]);

        DB::table('tasac')->insert([
            'monto'=>'34.20',
            'estado'=>'Activo',
            'created_at'=>'2020/05/19'
        ]);

        DB::table('tasac')->insert([
            'monto'=>'34.28',
            'estado'=>'Activo',
            'created_at'=>'2020/05/01'
        ]);
    }
}
