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
            'nombres' => 'Carlos Alberto',
            'apellidos' => 'Gonzales otalvaro',
            'fecha_nacimiento' => '3000-11-30',
            'email' => 'cargon@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('contrasena'),
        ]);
        

        DB::table('users')->insert([
            'nombres' => 'Mario ramirez',
            'apellidos' => 'otano caicedo',
            'fecha_nacimiento' => '2005-07-09',
            'email' => 'margo@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('contrasena'),
        ]);

        DB::table('users')->insert([
            'nombres' => 'Sebastian florez',
            'apellidos' => 'guerrero',
            'fecha_nacimiento' => '0001-01-01',
            'email' => 'sebasflorez@example.com',
            'tipo' => 'docente',
            'password' => bcrypt('contrasena'),
        ]);
        
        DB::table('docentes')->insert([
            'codigo' => '0000000000',
            'user_id' => DB::table('users')->where('nombres','Carlos Alberto')->value('id'),
        ]);
        
        DB::table('docentes')->insert([
            'codigo' => '0000000001',
            'user_id' => DB::table('users')->where('nombres','Mario ramirez')->value('id'),
        ]);
        
        DB::table('docentes')->insert([
            'codigo' => '0000000002',
            'user_id' => DB::table('users')->where('nombres','Sebastian florez')->value('id'),
        ]);
    }
}
