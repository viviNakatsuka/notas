@extends('layout')

@section('content')

    <div class= "col-sm-8">        
        <h2> 
            Nuevo Aviso
            <a href="{{ route('notas.index') }}" class="btn btn-default pull-right">Listado</a>
        </h2>         
        
        @include('notas.fragment.error')
        
        {!! Form::open(['route' => 'notas.store']) !!}
            @include('notas.fragment.form')
        {!! Form::close() !!}

    </div>
   
    <div class= "col-sm-4">
        
        
    </div>
@endsection