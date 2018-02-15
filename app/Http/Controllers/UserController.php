<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path = 'user';
    public function index()
    {
        // Lo utilizaremos para mostrar la página inicial
        //Traemos todos los registros de los usuarios.

        //$data = User::all();
        //Enviamos esos registros a la vista.
        //return view($this->path.'.index', compact('data'));
        $usr=Users::orderby('id','DESC')->paginate() ;
        return view('users.index',compac('usr')); //retorna una vista de la carpeta users del archivo index'!!index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Lo utilizaremos para mostrar el formulario de registro
        return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Este método es importante, lo usaremos para recuperar los datos escritos 
        //en el formulario y lo guardaremos en nuestra base de datos. Register user.
        
        try{
            $user = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('users.index');
        }
        catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Lo utilizaremos para eliminar a un usuario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Con este método mostraremos el formulario de edición
        $user = User::findOrFail($id);
        return view($this->path.'.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Con este método editaremos el registro
        $user = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         try{
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index');
        } catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}