<div class= "form-group">        
    {!! Form::label('protocolo_origen','Protocolo origen') !!}
    {!! Form::text('protocolo_origen',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('referencia','Referencia') !!}
    {!! Form::text('referencia',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">         
    {!! Form::label('fecha_doc','Fecha del Aviso') !!}    
    {!! Form::text('fecha_doc',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">    
    {!! Form::label('fecha_entrada','Fecha de Entrada') !!}
    {!! Form::text('fecha_entrada',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('asunto','Asunto') !!}
    {!! Form::text('asunto',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('fecha_salida','Fecha de salida') !!}
    {!! Form::text('fecha_salida',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('pide_respuesta','Responder') !!}
    {!! Form::text('pide_respuesta',null, ['class' => 'form-control']) !!}
</div>


<div class= "form-group">        
    {!! Form::label('estado','Estado') !!}
    {!! Form::text('estado',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('observaciones','Observaciones') !!}
    {!! Form::text('observaciones',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::label('dto_id','Dto') !!}
    {!! Form::text('dto_id',null, ['class' => 'form-control']) !!}
</div>

<div class= "form-group">        
    {!! Form::submit('Modificar', ['class' => 'btn btn-primary']) !!}
</div>