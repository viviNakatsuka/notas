<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Http\Requests\NotaRequest;
use Illuminate\Suport\Facades\Session;
use Illuminate\Database\Eloquent\Scope;
use Carbon\Carbon;

date_default_timezone_set("America/Argentina/Buenos_Aires");
Carbon::setLocale('es');

class NotaController extends Controller
{
    
    public function index(Request $request){
        //return 'index';
        //return view('notas.index');      
        //dd($request->get('protocolo_origen'));
        $nota = Nota::protocolo_origen($request->get('protocolo_origen'))->orderBy('id', 'DESC')->paginate(6); //ordenada         
        //$nota = Nota::orderBy('id', 'DESC')->paginate(6); //ordenada         
        return view('notas.index', compact('nota'));        
    }
    
    
    public function search(NotaRequest $request){
        //where de laravel recibe 3 parametros
        /*$query=trim($request->get('protocolo_origen'));
        if ($request)        
        {
            //$query=trim($request->get('protocolo_origen'));
            $nota=DB::table('nota')->where('protocolo_origen','LIKE','%' . query . '%')
                    ->orderBy('id','DESC')
                    ->paginate(6);
            /*$nota=DB::table('nota')->where('protocolo_origen','LIKE','%' . query . '%')
                    ->where ('estado','=','activo')
                    ->orderBy('id','DESC')
                    ->paginate(6);*/
        //}
        //$nota = Nota::orderBy('id', 'DESC')->paginate(6); //ordenada 
        
        return 'search';        
        /*{
         Gets the query string from our form submission 
        $query = Request::input('search');
        // Returns an array of articles that have the query string located somewhere within 
        // our articles titles. Paginates them so we can break up lots of search results.
        $articles = DB::table('articles')->where('title', 'LIKE', '%' . $query . '%')->paginate(10);

        // returns a view and passes the view the list of articles and the original query.
        return view('page.search', compact('articles', 'query'));
        }*/
    }
    
    
    public function create(){
        
        return view('notas.create');        
    }

    public function store(NotaRequest $request){ //$request: contiene todos los datos del formulario
        //return 'Nota guardada'.$request;      
        $nota = new Nota;             
                        
        $f=explode("/",$request->fecha_doc);
        $f_sql_doc=$f[2]."-".$f[0]."-".$f[1];
        //print_r($f_sql_doc)."<br/>";
        $request->fecha_doc=$f[2]."-".$f[1]."-".$f[0];
        
        //$fechaCorregida = date ('Y-m-d', strtotime($request->fecha_entrada));        
        //$request->fecha_doc=$fechaCorregida;        
        //$request->fecha_entrada=date ('Y-m-d', strtotime($request->fecha_entrada));
        $f=explode("/",$request->fecha_entrada);
        $request->fecha_entrada=$f[2]."-".$f[1]."-".$f[0];
        $fec=explode("/",$request->fecha_salida);     
        $request->fecha_salida=$fec[2]."-".$fec[1]."-".$fec[0];
        print_r($request->fecha_salida)."<br/>";
        
        $nota->id               = $request->id;
        $nota->protocolo_origen = $request->protocolo_origen;
        $nota->referencia       = $request->referencia;
        $nota->fecha_doc        = $request->fecha_doc;
        $nota->fecha_entrada    = $request->fecha_entrada;
        $nota->fecha_salida     = $request->fecha_salida;
        $nota->asunto           = $request->asunto;
        $nota->pide_respuesta   = $request->pide_respuesta;
        $nota->estado           = $request->estado;
        $nota->observaciones    = $request->observaciones;  
        $nota->dto_id           = $request->dto_id;  
        
        $nota->save();
           
        return redirect()->route('notas.index')
                ->with('info', 'El Aviso fue guardado ');         
    }    
    
    public function edit($id){
     
        $nota = Nota::find($id);
        return view('notas.edit', compact('nota'));   //muestra la vista edit              
    }

    public function update(NotaRequest $request, $id){
        //return 'nota actualizada ' . $id;                 
        $nota = Nota::find($id);           
            
           $f=explode("/",$request->fecha_doc);
           $f_sql_doc=$f[2]."-".$f[0]."-".$f[1];
           $request->fecha_doc=$f[2]."-".$f[1]."-".$f[0];

           $f=explode("/",$request->fecha_entrada);
           $request->fecha_entrada=$f[2]."-".$f[1]."-".$f[0];
           $fec=explode("/",$request->fecha_salida);
           $request->fecha_salida=$fec[2]."-".$fec[1]."-".$fec[0];
           
           //$nota->id               = $request->id;
           $nota->protocolo_origen = $request->protocolo_origen;
           $nota->referencia       = $request->referencia;
           $nota->fecha_doc        = $request->fecha_doc;
           $nota->fecha_entrada    = $request->fecha_entrada;
           $nota->fecha_salida     = $request->fecha_salida;
           $nota->pide_respuesta   = $request->pide_respuesta;
           $nota->estado           = $request->estado;
           $nota->asunto           = $request->asunto;
           $nota->observaciones    = $request->observaciones;
           $nota->dto_id           = $request->dto_id;         
           
           $nota->save();
           
        return redirect()->route('notas.index')
                ->with('info', 'El Aviso fue actualizado ');               
    }
    
    public function show($id){
         
        $nota = Nota::find($id);                     //la vista tiene el mismo nombre que el metodo
        return view('notas.show', compact('nota'));  //facilita corregir un error o extender el sistema
    } 
    
    public function destroy($id){
         
        $nota = Nota::find($id);
        $nota->delete();
        return back()->with('info', 'El Aviso fue eliminado ');        
    }    
}