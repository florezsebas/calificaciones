<?php

use Illuminate\Database\Seeder;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Grados jornada mañana
        DB::table('grados')->insert([
            'nombre' => 'Sexto',
            'jornada_id' => 1,
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Septimo',
            'jornada_id' => 1,
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Octavo',
            'jornada_id' => 1,
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Noveno',
            'jornada_id' => '1',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Decimo',
            'jornada_id' => '1',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Once',
            'jornada_id' => '1',
        ]);
        
        
        //Grados Jornada Tarde
        DB::table('grados')->insert([
            'nombre' => 'Sexto',
            'jornada_id' => '2',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Septimo',
            'jornada_id' => '2',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Octavo',
            'jornada_id' => '2',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Noveno',
            'jornada_id' => '2',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Decimo',
            'jornada_id' => '2',
        ]);
        
        DB::table('grados')->insert([
            'nombre' => 'Once',
            'jornada_id' => '2',
        ]);
    }
}
