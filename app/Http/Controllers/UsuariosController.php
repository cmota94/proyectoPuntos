<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormUsuariosRequest;

use App\User;
use DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        //Poner el mensaje de que debe de meter un criterio de busqueda.

        if($request){
            $usuario = trim($request->get('usu_nombre'));
            $usu_apellidoPaterno = trim($request->get('usu_apellidoPaterno'));
            $rol_idRol = $request->get('rol_nombre');

            if ($usuario) {
                $usuarios = DB::table('usuario as s')
                                ->join('rol as r', 'r.rol_idRol', '=', 's.rol_idRol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   's.id',
                                            's.usu_nombre', 
                                            's.usu_apellidoPaterno',
                                            's.usu_apellidoMaterno',
                                            's.email', 
                                            //'a.ar_nombre',
                                            'r.rol_nombre', 
                                            's.usu_estatus',
                                            'r.rol_idRol')
                                ->where('s.usu_nombre', 'LIKE', '%'. $usuario . '%')
                                //->orWhere('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6); 

            } elseif($usu_apellidoPaterno){

                $usuarios = DB::table('usuario as s')
                                ->join('rol as r', 'r.rol_idRol', '=', 's.rol_idRol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   's.id',
                                            's.usu_nombre', 
                                            's.usu_apellidoPaterno',
                                            's.usu_apellidoMaterno',
                                            's.email', 
                                            //'a.ar_nombre',
                                            'r.rol_nombre', 
                                            's.usu_estatus',
                                            'r.rol_idRol')
                                ->where('s.usu_apellidoPaterno', 'LIKE', '%'. $usu_apellidoPaterno . '%')
                                //->orWhere('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6);

            } elseif ($rol_idRol) {

                $usuarios = DB::table('usuario as s')
                                ->join('rol as r', 'r.rol_idRol', '=', 's.rol_idRol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   's.id',
                                            's.usu_nombre', 
                                            's.usu_apellidoPaterno',
                                            's.usu_apellidoMaterno',
                                            's.email', 
                                            //'a.ar_nombre',
                                            'r.rol_nombre', 
                                            's.usu_estatus',
                                            'r.rol_idRol')
                                //->where('s.usu_nombre', 'LIKE', '%'. $usuario . '%')
                                ->where('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6); 
            } else {

                $usuarios = DB::table('usuario as s')
                                ->join('rol as r', 'r.rol_idRol', '=', 's.rol_idRol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   's.id',
                                            's.usu_nombre', 
                                            's.usu_apellidoPaterno',
                                            's.usu_apellidoMaterno',
                                            's.email', 
                                            //'a.ar_nombre',
                                            'r.rol_nombre', 
                                            's.usu_estatus',
                                            'r.rol_idRol')
                                //->where('s.usu_nombre', 'LIKE', '%'. $usuario . '%')
                                //->orWhere('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6); 
            }

            $roles = DB::table('rol')->get();

            return view('usuarios.index', compact('usuarios', 'roles'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = DB::table('modulo')->get();
        $roles = DB::table('rol')->get();
        $areas = DB::table('area')->get();


        return view('usuarios.registrar', compact('modulos', 'roles', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormUsuariosRequest $request)
    {
        $usuario = new User($request->all());
        $password = 12345;
        $usuario->password = bcrypt($password);
        $usuario->save();

        return redirect('/usuarios')->with('status', 'El usuario '. $usuario->nombre . 'ha sido registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $modulos = DB::table('modulo')->get();
        $roles = DB::table('rol')->get();
        $areas = DB::table('area')->get();

        return view('usuarios.edit', compact('usuario', 'modulos', 'roles', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormUsuariosRequest $request, $id){

        $usuario = User::find($id)->update(array(
            'usu_nombre' => $request->input('usu_nombre'), 
            'usu_apellidoPaterno' => $request->input('usu_apellidoPaterno'),
            'usu_apellidoMaterno' => $request->input('usu_apellidoMaterno'), 
            'usu_estatus' => $request->input('usu_estatus'),    
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), 
            'mod_idModulo' => $request->input('mod_idModulo'), 
            'ar_idArea' => $request->input('ar_idArea'),
            'rol_idRol' => $request->input('rol_idRol')

        ));

        return redirect()->action('UsuariosController@index')->with('status', 'El registro del usuario se ha actualizado exitosamente');
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
    }

    public function cambiarEstatus($id){

        $usuario = User::find($id);

        if ($usuario->usu_estatus == 'Activo') {
            $usuario->usu_estatus = 'Inactivo';
            $usuario->update();

            return redirect('/usuarios')->with('status', 'El estatus del usuario ' . $usuario->usu_nombre . ' ha sido cambiado');

        } elseif ($usuario->usu_estatus == 'Inactivo') {
            $usuario->usu_estatus = 'Activo';
            $usuario->update();

            return redirect('/usuarios')->with('status', 'El estatus del usuario ' . $usuario->usu_nombre . ' ha sido cambiado');
        }
    }
}
