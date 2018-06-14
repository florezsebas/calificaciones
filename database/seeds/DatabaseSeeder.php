<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('DocentesTableSeeder');
        $this->call('AcudientesTableSeeder');
        $this->call('JornadasTableSeeder');
        $this->call('GradosTableSeeder');
        $this->call('GruposTableSeeder');
        $this->call('EstudiantesTableSeeder');
        $this->call('PeriodosTableSeeder');
        $this->call('CursosTableSeeder');
    }

}