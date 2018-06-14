<?php

use Illuminate\Database\Seeder;

class JornadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornadas')->insert([
            'nombre' => 'Mañana',
            'hora_inicio' => '06:45',
            'hora_fin' => '12:30',
        ]);
        
        DB::table('jornadas')->insert([
            'nombre' => 'Tarde',
            'hora_inicio' => '12:45',
            'hora_fin' => '18:45',
        ]);
    }
}
