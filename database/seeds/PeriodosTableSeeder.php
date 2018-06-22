<?php

use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert([
            'nombre' => 'Primer Periodo',
            'fecha_inicio' => '2018-01-22',
            'fecha_fin' => '2018-03-15',
            'anyo' => 2018,
        ]);
        
        DB::table('periodos')->insert([
            'nombre' => 'Segundo Periodo',
            'fecha_inicio' => '2018-03-18',
            'fecha_fin' => '2018-06-03',
            'anyo' => 2018,
        ]);
        
        DB::table('periodos')->insert([
            'nombre' => 'Tercero Periodo',
            'fecha_inicio' => '2018-07-22',
            'fecha_fin' => '2018-08-15',
            'anyo' => 2018,
        ]);
        
        DB::table('periodos')->insert([
            'nombre' => 'Cuarto Periodo',
            'fecha_inicio' => '2018-08-22',
            'fecha_fin' => '2018-10-15',
            'anyo' => 2018,
        ]);
    }
}
