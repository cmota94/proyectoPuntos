<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventosFormRequest;

use App\User;
use DB;
use App\Evento;
use PDF;
use Carbon\Carbon;

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
                 $eventos = DB::table('actividad as a')
                            ->join('subcategoria as s', 's.sub_idSubcategoria', '=', 'a.sub_idSubcategoria')
                            ->join('recinto as r', 'a.rec_idRecinto', '=', 'r.rec_idRecinto')
                            ->select(   's.sub_nombre', 
                                        'a.act_idActividad', 
                                        'a.act_nombre', 
                                        'a.act_fechaInicio',
                                        'a.act_horaInicio',
                                        'a.act_estatus', 
                                        'r.rec_nombre')
                            ->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            //->orWhere('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechaInicio', 'asc') 
                            ->simplePaginate(10);

            } elseif ($lugar) {

                 $eventos = DB::table('actividad as a')
                            ->join('subcategoria as s', 's.sub_idSubcategoria', '=', 'a.sub_idSubcategoria')
                            ->join('recinto as r', 'a.rec_idRecinto', '=', 'r.rec_idRecinto')
                            ->select(   's.sub_nombre', 
                                        'a.act_idActividad', 
                                        'a.act_nombre', 
                                        'a.act_fechaInicio',
                                        'a.act_horaInicio',
                                        'a.act_estatus', 
                                        'r.rec_nombre')
                            //->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            ->where('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechaInicio', 'asc') 
                            ->simplePaginate(10);

            } elseif ($actividad && $lugar) {

                 $eventos = DB::table('actividad as a')
                            ->join('subcategoria as s', 's.sub_idSubcategoria', '=', 'a.sub_idSubcategoria')
                            ->join('recinto as r', 'a.rec_idRecinto', '=', 'r.rec_idRecinto')
                            ->select(   's.sub_nombre', 
                                        'a.act_idActividad', 
                                        'a.act_nombre', 
                                        'a.act_fechaInicio',
                                        'a.act_horaInicio',
                                        'a.act_estatus', 
                                        'r.rec_nombre')
                            ->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            ->where('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechaInicio', 'asc') 
                            ->simplePaginate(10);
            } else {

                $eventos = DB::table('actividad as a')
                            ->join('subcategoria as s', 's.sub_idSubcategoria', '=', 'a.sub_idSubcategoria')
                            ->join('recinto as r', 'a.rec_idRecinto', '=', 'r.rec_idRecinto')
                            ->select(   's.sub_nombre', 
                                        'a.act_idActividad', 
                                        'a.act_nombre', 
                                        'a.act_fechaInicio',
                                        'a.act_horaInicio',
                                        'a.act_estatus', 
                                        'r.rec_nombre')
                            //->where('a.act_nombre', 'LIKE', '%'. $actividad . '%')
                            //->orWhere('a.sub_idSubcategoria', '=', $subcategoria)
                            //->orWhere('a.act_fechaInicio', '=', $fechaInicio)
                            //->orWhere('a.act_horaInicio', '=', $horaInicio)
                            //->orWhere('a.rec_idRecinto', '=', $lugar)
                            ->orderBy('act_fechaInicio', 'asc') 
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
    public function store(EventosFormRequest $request)
    {
        $evento = new Evento($request->all());
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
                            //->select('act_nombre')
                            ->where('act_idActividad', '=', $id)->get();
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
        $evento = Evento::find($id);
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
            'act_fechaInicio' => $request->input('act_fechaInicio'),
            'act_fechaFin' => $request->input('act_fechaFin'), 
            'act_horaInicio' => $request->input('act_horaInicio'),
            'act_horaFin' => $request->input('act_horaFin'),
            'act_numeroPuntos' => $request->input('act_numeroPuntos'),
            'act_descripcion' => $request->input('act_descripcion'),
            'act_estatus' => $request->input('act_estatus'),
            'ar_idArea' => $request->input('ar_idArea'),
            'sub_idSubcategoria' => $request->input('sub_idSubcategoria'),
            'rec_idRecinto' => $request->input('rec_idRecinto')
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

        $evento = DB::table('grupo as g')
                ->join('inscripción', 'insIdGrupo', '=', 'gruIdGrupo')
                ->join('actividad as a', 'gruIdActividad', '=', 'act_idActividad')
                ->select(   'act_nombre', 
                            'act_idActividad', 
                            'act_numeroPuntos', 
                            'insIdAlumno')
                ->where('act_idActividad', '=', $id)
                ->get();

        for ($i=0; $i < count($evento); $i++) { 
            $numerosCuenta[] = $evento[$i]->insIdAlumno;
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

    public function cargarPuntos($id){

        $evento = DB::table('actividad')
                ->select(   'act_nombre as actividad', 
                            'act_fechaInicio', 
                            'act_responsable', 
                            'act_horaInicio')
                ->where('act_idActividad', '=', $id)
                ->get();

        //dd($evento);

        return view('eventos.subir', compact('evento'));
    }


    public function generarReporte($id){

        $evento = DB::table('actividad')
                ->select('act_nombre', 'act_idActividad')
                ->where('act_idActividad', '=', $id)
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
