<?php

use Illuminate\Database\Seeder;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'codigo' => '108854562',
            'nombres' => 'Maria Mireya',
            'apellidos' => 'Acevedo Manriquez',
            'fecha_nacimiento' => '1975-11-30',
            'email' => 'maria@example.com',
            'tipo' => 'estudiante',
            'password' => bcrypt('123456'),
        ]);
        

        DB::table('users')->insert([
            'codigo' => '180054800',
            'nombres' => 'Juan Gabriel',
            'apellidos' => 'Calvillo Carrasco',
            'fecha_nacimiento' => '2005-07-09',
            'email' => 'juang@example.com',
            'tipo' => 'estudiante',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'codigo' => '15458798',
            'nombres' => 'Alejandro',
            'apellidos' =>  'Casas Bastida',
            'fecha_nacimiento' => '1994-01-01',
            'email' => 'alejoc@example.com',
            'tipo' => 'estudiante',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('estudiantes')->insert([
            'user_id' => DB::table('users')->where('nombres','Maria Mireya')->value('id'),
            'grupo_id' => 1,
            'acudiente_id' => DB::table('users')->where('nombres', 'Jose')->value('id'),
        ]);
        
        DB::table('estudiantes')->insert([
            'user_id' => DB::table('users')->where('nombres','Juan Gabriel')->value('id'),
            'grupo_id' => 2,
            'acudiente_id' => DB::table('users')->where('nombres', 'Jose')->value('id'),
        ]);
        
        DB::table('estudiantes')->insert([
            'user_id' => DB::table('users')->where('nombres','Alejandro')->value('id'),
            'grupo_id' => 3,
            'acudiente_id' => DB::table('users')->where('nombres', 'Mario')->value('id'),
        ]);
    }
}
