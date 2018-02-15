@extends('layout')

@section('content')

    <div class= "col-sm-8">        
        <h2> 
            {{ $nota->protocolo_origen }} 
            <a href="{{ route('notas.edit',$nota->id) }}" class="btn btn-default pull-right">Editar</a>
        </h2> 
        <p> 
            {{ $nota->referencia }}
        </p>
        {!! $nota->asunto !!}       
        {!! $nota->created_at->diffForHumans() !!}
        {!! DATE_FORMAT($nota->created_at,'d/m/Y') !!}

        <p> {{ $nota->fecha_doc    = date("d/m/Y", strtotime($nota->fecha_doc)) }}     </p>         
        <p> {{ $nota->fecha_entrada= date("d/m/Y", strtotime($nota->fecha_entrada)) }} </p>
        <p> {{ $nota->fecha_salida = date("d/m/Y", strtotime($nota->fecha_salida)) }}  </p>
        <p> {{ $nota->pide_respuesta }}</p> 
        <p> {{ $nota->estado }}        </p> 
        <p> {{ $nota->observaciones }} </p>         
    </div>
   
    <!--
    <div class= "col-sm-4">        
        @include('notas.fragment.aside')
    </div>  
    !-->
@endsection