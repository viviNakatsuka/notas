@extends('layout')

@section('content')
    <div class= "col-sm-8">       
        
        <h2> 
            Listado de Avisos y Notas
            <a href="{{ route('notas.create') }}" class="btn btn-primary pull-right">Nuevo</a>
        </h2>    
        @include('notas.fragment.info')       
        
        {!! Form::open(['route'=>'notas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-left', 'role' => 'search']) !!} 
            <div class="form-group">
                {!! Form::text('protocolo_origen', Request::get('protocolo_origen'), ['class' => 'form-control', 'placeholder' => 'protocolo_origen...']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th width="20px">ID</th>
                    <th> Protocolo origen</th>       
                    <th> ref.</th>                                        
                    <th> Fecha Aviso</th>                    
                    <th> Fecha Entrada</th>
                    <th> Fecha Salida</th>                    
                    <th> Responder</th>
                    <th> Estado</th>
                    <th> Observacion</th>
                    <th> Departamento</th>                     
                    <th colspan="3">&nbsp;</th>                                        
                </tr>
            </thead>
            <tbody>
                @foreach($nota as $notas)                                
                <tr>
                    <td>{{ $notas->id }}</td>
                    <td>
                        <strong>{{ $notas->protocolo_origen }}</strong>                      
                    </td>
                    <td>                        
                        {{ $notas->referencia }}
                    </td>                    
                    <td>        
                        {{ $notas->fecha_doc = date("d/m/Y", strtotime($notas->fecha_doc))}}                       
                    </td>                    
                    <td>
                        {{ $notas->fecha_entrada = date("d/m/Y", strtotime($notas->fecha_entrada))}}
                    </td>
                    <td>
                        {{ $notas->fecha_salida = date("d/m/Y", strtotime($notas->fecha_salida))}}
                    </td>
                    <td>                        
                        {{ $notas->pide_respuesta }}
                    </td>                    
                    <td>                        
                        {{ $notas->estado }}
                    </td>
                    <td>                        
                        {{ $notas->observaciones }}
                    </td>
                    <td>                        
                        {{ $notas->dto_id }}
                    </td>                    
                    <td>
                        <a href="{{ route('notas.show',$notas->id) }}" class="btn btn-link">ver</a>
                    </td>
                    <td>
                        <a href="{{ route('notas.edit',$notas->id) }}" class="btn btn-link">editar</a>
                    </td>
                    <td>
                        <form action="{{ route('notas.destroy',$notas->id) }}" method="POST">
                            {{ csrf_field() }}                           
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-link">borrar</button> 
                            <!--<button type='submit' style=border:none ><i class='fa fa-trash-o'; style='color:red'></i></button>-->
                        </form> 
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $nota->render() !!} 
    </div>
    <div class= "col-sm-4">        
        @include('notas.fragment.aside')
    </div>
@endsection