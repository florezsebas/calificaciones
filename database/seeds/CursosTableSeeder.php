<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<5; $i++){
            DB::table('cursos')->insert([
                'nombre' => 'Matematicas',
                'docente_id' => DB::table('users')->where('nombres', 'Carlos Alberto')->value('id'),
                'grupo_id' => DB::table('grupos')->where('id', 1)->value('id'),
                'periodo_id' => $i,
            ]);    
                
            DB::table('cursos')->insert([
                'nombre' => 'Filosofia',
                'docente_id' => DB::table('users')->where('nombres', 'Carlos Alberto')->value('id'),
                'grupo_id' => DB::table('grupos')->where('id', 1)->value('id'),
                'periodo_id' => $i,
            ]);
            
            DB::table('cursos')->insert([
                'nombre' => 'Educacion Fisica',
                'docente_id' => DB::table('users')->where('nombres', 'Mario')->value('id'),
                'grupo_id' => DB::table('grupos')->where('id', 1)->value('id'),
                'periodo_id' => $i,
            ]);
            
            DB::table('cursos')->insert([
                'nombre' => 'Etica',
                'docente_id' => DB::table('users')->where('nombres', 'Mario')->value('id'),
                'grupo_id' => DB::table('grupos')->where('id', 1)->value('id'),
                'periodo_id' => $i,
            ]);
        }
    }
}
