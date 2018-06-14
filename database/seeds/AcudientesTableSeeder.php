<?php

use Illuminate\Database\Seeder;

class AcudientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'codigo' => '9995555',
            'nombres' => 'Jose',
            'apellidos' => 'Grisales Ruiz',
            'fecha_nacimiento' => '1975-11-30',
            'email' => 'jose@example.com',
            'tipo' => 'acudiente',
            'password' => bcrypt('123456'),
        ]);
        

        DB::table('users')->insert([
            'codigo' => '55545544',
            'nombres' => 'Mario',
            'apellidos' => 'Grajales Martinez',
            'fecha_nacimiento' => '2005-07-09',
            'email' => 'mario@example.com',
            'tipo' => 'acudiente',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'codigo' => '15458798',
            'nombres' => 'Daniel',
            'apellidos' =>  'Guzman Guerrero',
            'fecha_nacimiento' => '1994-01-01',
            'email' => 'daniel@example.com',
            'tipo' => 'acudiente',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('acudientes')->insert([
            'user_id' => DB::table('users')->where('nombres','Jose')->value('id'),
        ]);
        
        DB::table('acudientes')->insert([
            'user_id' => DB::table('users')->where('nombres','Mario')->value('id'),
        ]);
        
        DB::table('acudientes')->insert([
            'user_id' => DB::table('users')->where('nombres','Daniel')->value('id'),
        ]);
    }
}
