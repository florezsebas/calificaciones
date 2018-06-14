<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Grupos para sexto
        DB::table('grupos')->insert([
            'nombre' => 'A',
            'grado_id' => 1,
        ]);
        
        DB::table('grupos')->insert([
            'nombre' => 'B',
            'grado_id' => 1,
        ]);
        
        //Grupos para septimo
        DB::table('grupos')->insert([
            'nombre' => 'A',
            'grado_id' => 2,
        ]);
        
        DB::table('grupos')->insert([
            'nombre' => 'B',
            'grado_id' => 2,
        ]);
        
        
        DB::table('grupos')->insert([
            'nombre' => 'A',
            'grado_id' => 3,
        ]);
        
        DB::table('grupos')->insert([
            'nombre' => 'B',
            'grado_id' => 3,
        ]);
        
        
        DB::table('grupos')->insert([
            'nombre' => 'A',
            'grado_id' => 4,
        ]);
        
        DB::table('grupos')->insert([
            'nombre' => 'B',
            'grado_id' => 4,
        ]);
    
    }
}
