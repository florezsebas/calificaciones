<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'codigo' => '000000000',
            'nombres' => 'Sebastian',
            'apellidos' => 'Florez Guerrero',
            'fecha_nacimiento' => '1975-11-30',
            'email' => 'florezsebas@utp.edu.co',
            'tipo' => 'admin',
            'password' => bcrypt('admin'),
        ]);
        
    }
}
