<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventosFormRequest;

use App\User;
use DB;
use App\Evento;
use App\Inscripcion;
use PDF;
use Carbon\Carbon;
use App\Bitacora;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            //$query = trim($request->get('searchText'));

            //$subcategoria = $request->input('subcategoria');
            $actividad = trim($request->get('actividad'));
            //$fechaInicio = $request->get('fechaInicio');
            //$horaInicio = $request->get('horaInicio');
            $lugar = $request->get('lugar');

            if ($actividad) {
                 $eventos = DB::table('actividad')
                            ->join('subcategoria', 'sub_idsubcategoria', '=', 'act_idsubcategoria')
                            ->join('recinto', 'act_idlugar', '=', 'rec_idrecinto')
                            ->select(   'sub_nombre', 
                                        'act_idactividad', 
                                        'act_nombre', 
                                        'act_fechainicio',
                                        'act_horainicio',
                                        'act_estatus',      
                                        'rec_nombre')
                            ->where('act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            //->orWhere('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechainicio', 'asc') 
                            ->simplePaginate(10);

            } elseif ($lugar) {

                 $eventos = DB::table('actividad')
                            ->join('subcategoria', 'sub_idsubcategoria', '=', 'act_idsubcategoria')
                            ->join('recinto as r', 'act_idlugar', '=', 'rec_idrecinto')
                            ->select(   'sub_nombre', 
                                        'act_idactividad', 
                                        'act_nombre', 
                                        'act_fechainicio',
                                        'act_horainicio',
                                        'act_estatus', 
                                        'rec_nombre')
                            //->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            ->where('act_idlugar', '=', $lugar)
                            ->orderBy('act_fechainicio', 'asc') 
                            ->simplePaginate(10);

            } elseif ($actividad && $lugar) {

                 $eventos = DB::table('actividad')
                            ->join('subcategoria', 'sub_idsubcategoria', '=', 'act_idsubcategoria')
                            ->join('recinto', 'act_idlugar', '=', 'rec_idrecinto')
                            ->select(   'sub_nombre', 
                                        'act_idactividad', 
                                        'act_nombre', 
                                        'act_fechainicio',
                                        'act_horainicio',
                                        'act_estatus', 
                                        'rec_nombre')
                            ->where('act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            ->where('rec_idrecinto', '=', $lugar)
                            ->orderBy('act_fechainicio', 'asc') 
                            ->simplePaginate(10);
            } else {

                $eventos = DB::table('actividad')
                            ->join('subcategoria', 'sub_idsubcategoria', '=', 'act_idsubcategoria')
                            ->join('recinto', 'act_idlugar', '=', 'rec_idrecinto')
                            ->select(   'sub_nombre', 
                                        'act_idactividad', 
                                        'act_nombre', 
                                        'act_fechainicio',
                                        'act_horainicio',
                                        'act_estatus', 
                                        'rec_nombre')
                            //->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            //->orWhere('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechainicio', 'asc') 
                            ->simplePaginate(10);

            }


           
            //dd($eventos);

            $fechaActual = new \DateTime();
            $fechaActual->format('Y-m-d');

            //dd($fecha);

            $categorias = DB::table('subcategoria')->get();
            $recintos = DB::table('recinto')->get();

            if ($eventos) {

                return view('eventos.index', compact('eventos', 'categorias', 'recintos', 'fechaActual'));

            } elseif(isset($eventos)) {

                return redirect('/eventos')->with('status', 'No se encontraron coincidencias');
            }

            
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $recintos = DB::table('recinto')->get();
        $subcategorias = DB::table('subcategoria')->get();

        return view('eventos.registrar', compact('recintos', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventosFormRequest $request){

        $bitacora = new Bitacora(array(
            'bit_dispositivo' => $request->get('bit_dispositivo'),
            'bit_navegador' => $request->get('bit_navegador'),
            'bit_direccionip' => $request->get('bit_direccionip'),
            'bit_idusuario' => $request->get('bit_idusuario') 
        ));

        $bitacora->save();

        //  dd($bitacora);

        $evento = new Evento(array(
            'act_nombre' => $request->get('act_nombre'), 
            'act_tipo' => $request->get('act_tipo'),
            'act_responsable' => $request->get('act_responsable'),
            'act_numeropuntos' => $request->get('act_numeropuntos'),
            'act_descripcion' => $request->get('act_descripcion'),
            'act_estatus' => $request->get('act_estatus'),
            'act_idarea' => $request->get('act_idarea'),
            'act_idsubcategoria' => $request->get('act_idsubcategoria'),
            'act_idlugar' => $request->get('act_idlugar'),
            'act_fechainicio' => $request->get('act_fechainicio'),
            'act_fechafin' => $request->get('act_fechafin'),
            'act_horainicio' => $request->get('act_horainicio'),
            'act_horafin' => $request->get('act_horafin')

        ));
        $evento->act_idbitacora = $bitacora->bit_idbitacora;
        $evento->save();

        return redirect('/eventos')->with('status', 'El evento '. $evento->act_nombre . 'ha sido registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     **/

    public function show($id)
    {
        //$evento = Evento::find($id);

        $evento = DB::table('actividad')
                            ->join('bitacora', 'act_idbitacora', '=', 'bit_idbitacora')
                            ->join('usuario', 'bit_idusuario', '=', 'id')
                            ->select('act_nombre', 'usu_nombre', 'act_responsable', 'act_fechainicio', 'act_fechafin', 'act_horainicio', 'act_horafin', 'act_numeropuntos', 'act_estatus', 'act_descripcion', 'usu_nombre')
                            ->where('act_idactividad', '=', $id)->get();

        $recintos = DB::table('recinto')->get();
        $subcategorias = DB::table('subcategoria')->get();

        return view('eventos.show', compact('evento', 'recintos', 'subcategorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$evento = Evento::find($id);
        $evento = DB::table('actividad')
                            ->join('bitacora', 'act_idbitacora', '=', 'bit_idbitacora')
                            ->join('usuario', 'bit_idusuario', '=', 'id')
                            ->select(   'act_nombre',  
                                        'act_responsable', 
                                        'act_fechainicio', 
                                        'act_fechafin', 
                                        'act_horainicio', 
                                        'act_horafin', 
                                        'act_numeropuntos', 
                                        'act_estatus', 
                                        'act_descripcion', 
                                        'usu_nombre', 
                                        'act_idactividad',
                                        'usu_nombre')
                            ->where('act_idactividad', '=', $id)->get();    
        $recintos = DB::table('recinto')->get();
        $subcategorias = DB::table('subcategoria')->get();

        return view('eventos.edit', compact('evento', 'recintos', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventosFormRequest $request, $id){

        $evento = Evento::find($id)->update(array(
            'act_nombre' => $request->input('act_nombre'),
            'act_responsable' => $request->input('act_responsable'),
            'act_fechainicio' => $request->input('act_fechainicio'),
            'act_fechafin' => $request->input('act_fechafin'), 
            'act_horainicio' => $request->input('act_horainicio'),
            'act_horafin' => $request->input('act_horafin'),
            'act_numeropuntos' => $request->input('act_numeropuntos'),
            'act_descripcion' => $request->input('act_descripcion'),
            'act_estatus' => $request->input('act_estatus'),
            'act_idarea' => $request->input('act_idarea'),
            'act_idsubcategoria' => $request->input('act_idsubcategoria'),
            'act_idlugar' => $request->input('act_idlugar')
        ));

        return redirect('/eventos')->with('status', 'El registro del evento ha sido actualizado exitosamente');
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

        $evento = Evento::find($id);

        if ($evento->act_estatus == 'Por realizar') {
            $evento->act_estatus = 'Cancelado';
            $evento->update();

            return redirect('/eventos')->with('status', 'El estatus del evento ' . $evento->act_nombre . ' ha sido cambiado');

        } elseif ($evento->act_estatus == 'Cancelado') {
            $evento->act_estatus = 'Por realizar';
            $evento->update();

            return redirect('/eventos')->with('status', 'El estatus del evento ' . $evento->act_nombre . ' ha sido cambiado');
        }
    }

    public function mostrarDetallesEvento($id){

        $evento = DB::table('grupo')
                ->join('inscripción', 'insidgrupo', '=', 'gruidgrupo')
                ->join('actividad', 'gruidactividad', '=', 'act_idactividad')
                ->select(   'act_nombre', 
                            'act_idactividad', 
                            'act_numeropuntos', 
                            'insidalumno')
                ->where('gruidactividad', '=', $id)
                ->get();

        for ($i=0; $i < count($evento); $i++) { 
            $numerosCuenta[] = $evento[$i]->insidalumno;
        }

        //dd($numerosCuenta);
        //$numerosCuenta = $evento[1]->insIdAlumno;

        //dd(count($evento));

        $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
        $db = pg_connect($connString) or die('connection failed');

        for ($i=0; $i < count($numerosCuenta); $i++) { 

            $alumnos[] = pg_query($db, "    select  alumNombre,
                                                    alumApellidoPaterno,
                                                    alumApellidoMaterno, 
                                                    alumIdAlumno, 
                                                    carrNombre, 
                                                    plesSistema 
                                            from alumno, alumno_planEstudios, planEstudios, carrera
                                            where alumIdAlumno = alplaIdAlumno
                                            and plesIdPlan = alplaIdPlanEstudios
                                            and plesIdCarrera = carrIdCarrera
                                            and alumIdAlumno =".$numerosCuenta[$i]);
            $alumnosR[] = pg_fetch_row($alumnos[$i]);
        }


        //$alumnosR = json_encode($array);

        //$alumnosR[] = pg_fetch_row($alumnos[$i]);
        //dd($alumnosR);
        

        $inscripcion = DB::table('inscripción')->get();

        //$alumnos = pg_fetch_array($query);
        //dd(pg_fetch_row($alumnos));
 
        return view('eventos.reportesIndex', compact('evento', 'alumnosR', 'inscripcion'));
    }

    public function subirPuntos($id){

        $evento = DB::table('actividad')
                ->join('grupo', 'gruidgrupo', '=', 'act_idactividad')
                ->join('inscripción', 'gruidgrupo', '=', 'insidgrupo')
                ->select(   'act_nombre as actividad', 
                            'act_fechainicio', 
                            'act_responsable', 
                            'act_horainicio',
                            'act_idactividad',
                            'gruidgrupo')
                ->where('act_idactividad', '=', $id)
                ->first();

        //dd($evento);

        return view('eventos.subir', compact('evento'));
    }


    public function registrarPuntos(Request $request){

            //Hacemos una consulta de todas las actividades posibles.
        $eventos = DB::table('actividad')->get();


            //Conexion a la base de datos de AE, para consultar a los alumnos si se encuentran o no registrados.
        $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
        $db = pg_connect($connString) or die('connection failed');

            //Obtenemos los numeros de cuenta y los indexamos en un arreglo.
        $numerosCuenta = $request->get('numeros');
        $numeros = explode("\r\n", $numerosCuenta);
        $numerosCuenta2 = explode("\r\n", $numerosCuenta);

        //dd($numeros);

            //Hacemos la consulta de los alumnos que se ingresaron.
        for ($i=0; $i < count($numeros); $i++) { 

            $alumnos[] = pg_query($db, "    select  alumIdAlumno
                                            from alumno, alumno_planEstudios, planEstudios, carrera
                                            where alumIdAlumno = alplaIdAlumno
                                            and plesIdPlan = alplaIdPlanEstudios
                                            and plesIdCarrera = carrIdCarrera
                                            and alumIdAlumno =". substr($numeros[$i], 0, 9));
           
            $alumnosR[] = pg_fetch_row($alumnos[$i]);

            /*if($clave = array_search(false, $alumnosR) != false){
                unset($alumnosR[$clave]);
            }*/
        }

        //substr($numeros[$i], 0, 9)
        //dd($alumnosR);

            //debemos de comparar los numeros de cuenta que estan en la base de datos y los que no.

        for ($i=0; $i < count($alumnosR); $i++) { 
            for ($a=0; $a < 1; $a++) { 
                $resultado[] = $alumnosR[$i][$a];
            }
        }

            //Este arreglos no regresa los numeros de cuenta que se ingresaron pero que no están en la base de datos.
        $resultado2 = array_diff_assoc($numeros, $resultado); 
        //dd($resultado2);


            //Recorremos el arreglo de los numeros de cuenta que se ingresaron para saber si hay numeros de cuenta que no son numeros de cuenta y son numeros de cuenta de algun maestro.

        $contador2 = 0;
        for($b=0; $b < count($numerosCuenta2); $b++){
            if(strlen($numerosCuenta2[$b]) > 9){
                $contador2=$contador2+1;
            }
        }

        //dd($contador2);

        //dd($alumnosR);
        array_filter($alumnosR);
        //dd(count(array_values($alumnosR)));

        if ($contador2 >= 2) {

            return view('eventos.eventos', compact('numerosCuenta', 'contador2', 'eventos', 'numerosValidados', 'resultado2'));

            $pdf = PDF::loadView('eventos.numerosNR', compact('resultado2'));
            return $pdf->download('numeros de cuenta no validos.pdf');

        } else {

            //dd($numeros);
            $fecha = new \DateTime();

            $contador = 0;

            while ($contador < count(array_filter($alumnosR))) {
                    $inscripcion = new Inscripcion(array(
                    'insidgrupo' => $request->input('insidgrupo'),
                    'insidalumno' => $alumnosR[$contador][0],
                    'insfechainscripcion' => $fecha,
                    'insestatus' => 'Registrado'
                ));

                $inscripcion->save();
                $contador=$contador+1;
            }

            return redirect('/eventos')->with('status', 'Se han registrado los numeros de cuenta exitosamente');
        }
    }


    public function generarReporte($id){

        $evento = DB::table('actividad')
                ->select('act_nombre', 'act_idactividad')
                ->where('act_idactividad', '=', $id)
                ->get();

        $connString = "host=rigel.fca.unam.mx dbname=li313304901 user=li313304901 password=rigelFCA";
        $db = pg_connect($connString) or die('connection failed');

        $alumnos = pg_query($db, "select    alumNombre, 
                                            alumIdAlumno, 
                                            carrNombre, 
                                            plesSistema 
                                    from alumno, alumno_planEstudios, planEstudios, carrera
                                    where alumIdAlumno = alplaIdAlumno
                                    and plesIdPlan = alplaIdPlanEstudios
                                    and plesIdCarrera = carrIdCarrera");
        $fecha = new \DateTime();
        //$alumnos = pg_fetch_array($query);

        //dd($alumnos);

        $pdf = PDF::loadView('eventos.reporte', compact('alumnos', 'fecha', 'evento'));
        return $pdf->download('reporte.pdf');
    }
}

