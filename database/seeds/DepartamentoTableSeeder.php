<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('Departamento')->insert([
    	 	'id'=>rand(0,1),            
            'nombre'=>str_random(10)            
            ]);
         //factory(App\Departamento::class,50)->create();
    }
}
