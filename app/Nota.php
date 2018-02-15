<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class Nota extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * $table->increments('id');
            $table->string('protocolo_origen',10);
            $table->string('referencia',10);
            $table->date('fecha_doc');
            $table->date('fecha_entrada');
            $table->string('asunto',20);
            $table->date('fecha_salida');
            $table->string('pide_respuesta');
            $table->string('estado');
            $table->string('observaciones',20);
            $table->integer('dto_id');
            $table->timestamps();
     */
    protected $fillable = [
        'id', 'protocolo_origen', 'referencia', 
        'fecha_doc','fecha_entrada', 'asunto', 
        'fecha_salida', 'pide_respuesta', 'estado', 
        'observaciones','dto_id',
    ];
    
    public function scopeProtocolo_origen($query, $protocolo_origen)
    {
        //dd("scope: ". $protocolo_origen); para verificar que se ve
        if (trim($protocolo_origen!=""))
        {
            $query->where(DB::raw("CONCAT(protocolo_origen, ' ', referencia)"),"LIKE","%$protocolo_origen%");
        }    
    }
}
