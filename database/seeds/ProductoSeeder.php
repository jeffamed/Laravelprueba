<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre'=>'Ron Flor de Caña Centenario 18 años',
            'stock'=>'1000',
            'SKU'=>'1R02Y0J0',
            'precioCordoba'=>'1825.50',
            'precioDolar'=>'49',
            "descripcion"=>'Licor de excelente calidad añejado 18 años',
            'estado'=>'Activo',
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Ron Flor de Caña Centenario 12 años',
            'stock'=>'500',
            'SKU'=>'Y25I3678T00',
            'precioCordoba'=>'1250',
            'precioDolar'=>'34.90',
            "descripcion"=>'Licor de excelente calidad añejado durante 12 años',
            'estado'=>'Activo',
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Ron Flor de Caña Centenario 25 años',
            'stock'=>'250',
            'SKU'=>'W78R78T00',
            'precioCordoba'=>'4980.69',
            'precioDolar'=>'150.99',
            "descripcion"=>'Licor de excelente calidad añejado durante 25 años',
            'estado'=>'Activo',
        ]);

        DB::table('productos')->insert([
            'nombre'=>'Ron Flor de Caña Centenario 5 años',
            'stock'=>'10',
            'SKU'=>'W7258R78T050',
            'precioCordoba'=>'500',
            'precioDolar'=>'10.90',
            "descripcion"=>'Licor de excelente calidad añejado durante 5 años',
            'estado'=>'Inactivo',
        ]);
    }
}
