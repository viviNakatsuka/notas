@extends('layout') 
        
@section('content')
        
    <div class= "col-sm-8">        
        <h2> 
            Editar Avisos            
            <a href="{{ route('notas.index') }}" class="btn btn-default pull-right">Listado</a>
        </h2>
        
        @include('notas.fragment.error')
        
        {{ Form::hidden('nota->fecha_doc', $nota->fecha_doc=date("d/m/Y", strtotime($nota->fecha_doc))) }}        
        {{ Form::hidden('nota->fecha_entrada', $nota->fecha_entrada=date("d/m/Y", strtotime($nota->fecha_entrada))) }}
        {{ Form::hidden('nota->fecha_salida', $nota->fecha_salida=date("d/m/Y", strtotime($nota->fecha_salida))) }}
        
        {!! Form::model($nota, ['route'=> ['notas.update', $nota->id], 'method'=> 'PUT']) !!}                
            @include('notas.fragment.form')
        {!! Form::close() !!}
    </div>
   
    <!--
    <div class= "col-sm-4">        
        @include('notas.fragment.aside')
    </div>  
    !-->
@endsection