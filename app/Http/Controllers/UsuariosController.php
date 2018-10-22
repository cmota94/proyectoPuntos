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
            $usu_apellidoPaterno = trim($request->get('usu_apellidopaterno'));
            $rol_idRol = $request->get('rol_nombre');

            if ($usuario) {
                $usuarios = DB::table('usuario as s')
                                ->join('rol', 'rol_idrol', '=', 'usu_idrol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   'id',
                                            'usu_nombre', 
                                            'usu_apellidopaterno',
                                            'usu_apellidomaterno',
                                            'email', 
                                            //'a.ar_nombre',
                                            'rol_nombre', 
                                            'usu_estatus',
                                            'rol_idrol')
                                ->where('usu_nombre', 'LIKE', '%'. $usuario . '%')
                                //->orWhere('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6); 

            } elseif($usu_apellidoPaterno){

                $usuarios = DB::table('usuario')
                                ->join('rol', 'rol_idrol', '=', 'usu_idrol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   'id',
                                            'usu_nombre', 
                                            'usu_apellidopaterno',
                                            'usu_apellidomaterno',
                                            'email', 
                                            //'a.ar_nombre',
                                            'rol_nombre', 
                                            'usu_estatus',
                                            'rol_idrol')
                                ->where('usu_apellidopaterno', 'LIKE', '%'. $usu_apellidoPaterno . '%')
                                //->orWhere('r.rol_idRol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6);

            } elseif ($rol_idRol) {

                $usuarios = DB::table('usuario')
                                ->join('rol', 'rol_idrol', '=', 'usu_idrol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   'id',
                                            'usu_nombre', 
                                            'usu_apellidopaterno',
                                            'usu_apellidomaterno',
                                            'email', 
                                            //'a.ar_nombre',
                                            'rol_nombre', 
                                            'usu_estatus',
                                            'rol_idrol')
                                //->where('s.usu_nombre', 'LIKE', '%'. $usuario . '%')
                                ->where('rol_idrol', '=', $rol_idRol)
                                ->orderBy('usu_nombre', 'asc')
                                ->simplePaginate(6); 
            } else {

                $usuarios = DB::table('usuario')
                                ->join('rol as r', 'rol_idrol', '=', 'usu_idrol')
                                //->join('area as a','a.ar_idArea', '=', 's.ar_idArea')
                                ->select(   'id',
                                            'usu_nombre', 
                                            'usu_apellidopaterno',
                                            'usu_apellidomaterno',
                                            'email', 
                                            //'a.ar_nombre',
                                            'rol_nombre', 
                                            'usu_estatus',
                                            'usu_idrol')
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
        //$modulos = DB::table('modulo')->get();
        $roles = DB::table('rol')->get();
        $areas = DB::table('area')->get();

        //dd($areas);

        return view('usuarios.registrar', compact('roles', 'areas'));
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

        return redirect('/usuarios')->with('status', 'El usuario '. $usuario->nombre . 'ha sido registrado exitosamente con la contraseña: ' . $password);
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
        //$modulos = DB::table('modulo')->get();
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
            'usu_apellidopaterno' => $request->input('usu_apellidopaterno'),
            'usu_apellidomaterno' => $request->input('usu_apellidomaterno'), 
            'usu_estatus' => $request->input('usu_estatus'),    
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), 
            //'mod_idModulo' => $request->input('mod_idModulo'), 
            'ar_idarea' => $request->input('ar_idarea'),
            'rol_idrol' => $request->input('rol_idrol')

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
