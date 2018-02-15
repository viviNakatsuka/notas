<?php

use Illuminate\Database\Seeder;
use App\Nota;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 	/*DB::table('Notas')->insert([
    	 	//'id'=>integer(1),            
            'protocolo_origen'=>str_random(10),
            'referencia'=>str_random(10),
            //'fecha_doc'=>date(),
            //'fecha_entrada'=>date(),
            'asunto'=>str_random(20),
            //'fecha_salida'=>date(),
            'pide_respuesta'=>str_random(1),
            'estado'=>str_random(50),
            'observaciones'=>str_random(20),
            'dto_id'=>rand(0, 10),
            ]);*/
        factory(App\Nota::class,2)->create();
    }
}
