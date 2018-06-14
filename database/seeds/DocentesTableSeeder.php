<?php

use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'codigo' => '108800055',
            'nombres' => 'Carlos Alberto',
            'apellidos' => 'Gonzales otalvaro',
            'fecha_nacimiento' => '1975-11-30',
            'email' => 'cargon@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('123456'),
        ]);
        

        DB::table('users')->insert([
            'codigo' => '96656540',
            'nombres' => 'Mario',
            'apellidos' => 'Caicedo Mazo',
            'fecha_nacimiento' => '2005-07-09',
            'email' => 'margo@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'codigo' => '54884140',
            'nombres' => 'Sebastian',
            'apellidos' => 'Florez Guerrero',
            'fecha_nacimiento' => '1994-01-01',
            'email' => 'sebasflorez@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('docentes')->insert([
            'user_id' => DB::table('users')->where('nombres','Carlos Alberto')->value('id'),
        ]);
        
        DB::table('docentes')->insert([
            'user_id' => DB::table('users')->where('nombres','Mario ramirez')->value('id'),
        ]);
        
        DB::table('docentes')->insert([
            'user_id' => DB::table('users')->where('nombres','Sebastian florez')->value('id'),
        ]);
    }
}
