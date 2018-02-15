<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
          * @return array  
     *      $table->date('fecha_doc')     ->nullable();
            $table->date('fecha_entrada') ->nullable();
            $table->string('asunto',20)   ->nullable();
            $table->date('fecha_salida')  ->nullable();
            $table->date('pide_respuesta')->nullable();
            $table->date('estado')        ->nullable();
            $table->string('observaciones',20)->nullable();
            $table->integer('dto_id')     ->nullable();
            $table->timestamps();
     */
    public function rules()
    {
        return [
            //'id'               => 'required',
            'protocolo_origen' => 'required', //campo requerido: obligatorio
            'referencia'       => 'required',
            'fecha_doc'        => 'date_format:d/m/Y',
            'fecha_entrada'    => 'date_format:d/m/Y',
            'fecha_salida'     => 'date_format:d/m/Y',
            //'date_format:d/m/Y|after:tomorrow',
        ]; 
    }
}